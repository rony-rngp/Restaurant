<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function index(){
        if (Session::has('order_id')){
            return view('frontend.stripe');
        }else{
            return redirect()->route('cart');
        }
    }

    public function payment(Request $request)
    {

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
        $order->shipping_charges = Session::get('shipping_charges');
        $order->grand_total = Session('grand_total');
        $order->save();
        Session::put('order_id', $order->id);


        $contents = Cart::content();
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

//        $order = Order::with('user')->find(Session::get('order_id'));

        if($order->payment_status == 'Complete'){
            Session::forget('order_id');
            Session::forget('grand_total');
            Session::forget('coupon_amount');
            Session::forget('coupon_code');
            Session::forget('shipping_charges');
            Cart::destroy();

            notify()->error('Order already completed!', 'Error');
            return redirect()->route('checkout');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data =  Stripe\Charge::create([
            "amount" => Session::get('grand_total')*100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => 'Payment successfully completed',
            "receipt_email" => $order->user->email,

        ]);


        if($data['status'] == 'succeeded') {

            if ($order->payment_status == 'Pending') {
                $update_product = DB::table('orders')
                    ->where('id', $order->id)
                    ->update(['payment_status' => 'Complete', 'transaction_id' => $data->id]);


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
                notify()->error('Order already completed!', 'Error');
                return redirect()->route('cart');
            }

        } else {
            notify()->error('Something went to wrong!', 'Error');
            return redirect()->route('checkout');
        }



    }
}
