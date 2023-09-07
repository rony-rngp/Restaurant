<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::with('order_products', 'user')->where('user_id', $user->id)->latest()->get();
        return view('frontend.user.account', compact('user', 'orders'));
    }

    public function order_details($id)
    {   $user = Auth::user();
        $order = Order::with('order_products', 'user')->where(['id'=> $id, 'user_id' => Auth::user()->id])->first();
        return view('frontend.order_details', compact('user', 'order'));
    }
}
