<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function show()
    {
        $orders = Order::with('order_products','user')->latest()->get();
        return view('backend.order.view_order', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::with('order_products','user')->where('id', $id)->firstOrFail();
        $order_logs = OrderLog::where('order_id', $id)->get();

        if ($order->is_seen == 0){
            $order->is_seen = 1;
            $order->save();
        }
        return view('backend.order.order_details', compact('order', 'order_logs'));
    }

    public function print($id)
    {
        $order = Order::with('order_products','user')->where('id', $id)->firstOrFail();
        return view('backend.order.print_order', compact('order'));
    }

    public function status(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->save();

        //---Update Order log--
        $log = new OrderLog();
        $log->order_id = $id;
        $log->order_status = $request->order_status;
        $log->save();

        //----Send Mail
        $order_details = Order::with('order_products','user')->where('id', $order->id)->first();
        $email = $order_details->user->email;
        $data = [
            'name' => $order_details->user->name,
            'email' => $email,
            'order_details' => $order_details,
        ];

        Mail::send('backend.emails.order_status', $data, function ($messege) use ($email){
            $messege->to($email)->subject('Order Status Updated - Restaurant');
        });

        notify()->success('Order Status Updated', 'Success');
        return redirect()->back();
    }
}
