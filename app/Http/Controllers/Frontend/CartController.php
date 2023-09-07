<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Coupon;
use App\Model\MinMaxAmount;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\OrderTime;
use App\Model\PaymentMethod;
use App\Model\Product;
use App\Model\ShippingCharges;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($product->status == 1){

            $items = [];

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->offer_price,
                'weight' => 550,
                'options' => [
                    'image' => $product->image,
                    'items' => $items
                ]
            ]);

            //Forget Coupon Session
            Session::forget('coupon_amount');
            Session::forget('coupon_code');

            $message = "Product successfully added in cart";
            $totalCartItems = Cart::count();
            return response()->json([
                'totalCartItems' => $totalCartItems,
                'message' => $message,
                'status' => true,
            ]);
        }else{
            $message = "Product Inactive";
            $cart_count = Cart::count();
            return response()->json([
                'cart_count' => $cart_count,
                'message' => $message,
                'status' => false,
            ]);
        }

    }

    public function show_cart()
    {
        $contents = Cart::content();
        $payment_methods = PaymentMethod::where('status', 1)->get();
        $order_times = OrderTime::where('status', 1)->get();
        $shipping_charges = ShippingCharges::find(1);
        return view('frontend.cart', compact('contents', 'payment_methods', 'order_times', 'shipping_charges'));
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        //Forget Coupon Session
        Session::forget('coupon_amount');
        Session::forget('coupon_code');
        notify()->success('Product removed from cart', 'Success');
        return redirect()->back();
    }

    public function apply_coupon(Request $request)
    {

        //Forget Coupon Session
        Session::forget('coupon_amount');
        Session::forget('coupon_code');

//        dd(Session::get('coupon_amount'));

       $coupon_count = Coupon::where('name', $request->coupon_code)->count();

       $contents = Cart::content();
        $total = 0;
       foreach ($contents as $content){
           $total +=  $content->price *  $content->qty;
       }

       if ($coupon_count == 1){
           $coupon_details = Coupon::where('name', $request->coupon_code)->first();
           if($coupon_details->status == 0){
               $message = "This Coupon is not active!";
               return response()->json([
                   'status' => false,
                   'message' => $message
               ]);
           }else{
               //Check Amount Type
               if($coupon_details->type == 'Amount'){
                   $coupon_amount = $coupon_details->amount;
               }else{
                   $coupon_amount = $total*$coupon_details->amount/100;
                   $coupon_amount = (int)$coupon_amount;
               }
               //Add coupon Code & Amount in Session
               Session::put('coupon_amount', $coupon_amount);
               Session::put('coupon_code', $request->coupon_code);
               $message = "Coupon Successfully Applied";
           }

           return response()->json([
              'status' => true,
              'message' => $message
           ]);
       }else{
           $message = 'Invalid Coupon Code';
           return response()->json([
               'status' => false,
               'message' => $message
           ]);
       }
    }

    public function place_order(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('user.login');
        }

        if(Cart::count() == 0){
            notify()->error('Your cart is empty...You need to shopping first!!');
            return redirect()->route('cart');
        }



        if ($request->payment_method == '' || $request->delivery_type == '' || $request->order_date == '' || $request->order_time == ''){
            notify()->error('Filed Must not be empty!!');
            return redirect()->route('cart');
        }

        $this->validate($request, [
            'payment_method' => 'required',
            'delivery_type' => 'required',
            'order_date' => 'required',
            'order_time' => 'required',
        ]);



        if ($request->delivery_type == 1){
            $shipping_charges = ShippingCharges::find(1)->shipping_charges;
        }else{
            $shipping_charges = 0;
        }

        Session::put('shipping_charges', $shipping_charges);

        $contents = Cart::content();
        $total = 0;
        foreach ($contents as $content){
            $total +=  $content->price *  $content->qty;
        }

        $grand_total = ( $total - Session::get('coupon_amount') ) + $shipping_charges;
        Session::put('grand_total', $grand_total);


        $mix_max_amount = MinMaxAmount::find(1);
        if ($mix_max_amount->min_amount > $grand_total ){
            notify()->error('Minimum Order Amount'.' '.$mix_max_amount->min_amount);
            return redirect()->route('cart');
        }elseif ($mix_max_amount->max_amount < $grand_total){
            notify()->error('Maximum Order amount'.' '.$mix_max_amount->max_amount);
            return redirect()->route('cart');
        }

        if ($request->payment_method == 'Stripe'){
            return view('frontend.stripe',compact('request', 'shipping_charges'));
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->delivery_type = $request->delivery_type;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->postal_code = $request->postal_code;
        $order->coupon_code = Session::get('coupon_code');
        $order->coupon_amount =Session::get('coupon_amount');
        $order->order_date = date('Y-m-d', strtotime($request->order_date));
        $order->order_time = $request->order_time;
        $order->comments = $request->comments;
        $order->payment_method = $request->payment_method;
        $order->order_status = 'New';
        if ($request->payment_method == 'Stripe'){
            $order->payment_status = 'Pending';
        }
        $order->transaction_id = '';
        $order->shipping_charges = $shipping_charges;
        $order->grand_total = $grand_total;
        $order->save();
        Session::put('order_id', $order->id);

        foreach ($contents as $content){
            $order_products = new OrderProduct();
            $order_products->order_id = $order->id;
            $order_products->user_id = Auth::user()->id;
            $order_products->name = $content->name;
            $order_products->qty = $content->qty;
            $order_products->price = $content->price;
            if ($content->options->items != null){
                $order_products->items = $content->options->items;
            }else{
                $order_products->items = '';
            }
            $order_products->save();
        }

        if ($request->payment_method != 'Stripe'){


            //----Send Mail
            $order_details = Order::with('order_products','user')->where('id', $order->id)->first();
            $email = Auth::user()->email;
            $data = [
                'name' => Auth::user()->name,
                'email' => $email,
                'order_details' => $order_details,
            ];

            Mail::send('frontend.emails.order', $data, function ($messege) use ($email){
                $messege->to($email)->subject('Order Placed - Restaurant');
            });


            return redirect()->route('thanks');

        }else{
            //-----Stripe-----
            return redirect('/stripe');
        }


    }

    public function thanks()
    {
        if(Session::has('order_id')){
            Cart::destroy();
            return view('frontend.thanks');
        }else{
            return redirect()->route('cart');
        }
    }

    public function stripe()
    {

    }

}
