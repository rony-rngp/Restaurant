<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8|max:32',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->save();

            notify()->success('Registration Complete. Yor can login now');
            return redirect()->route('user.login');
        }

        return view('frontend.auth.register');
    }

    public function login(Request $request)
    {
        if (Auth::check()){
            return redirect()->route('account');
        }

        if($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                //Check Email is activated or not
                $user_status = User::where('email', $request->email)->first();
                if ($user_status->status == 0) {
                    Auth::logout();
                    notify()->error('Your account is inactive!', 'Error');
                    return redirect()->back();
                }
                $contents = Cart::content()->count();
                if ($contents > 0) {
                    return redirect('/cart');
                } else {
                    return redirect()->route('account');
                }

            }else{
                notify()->error('Sorry ! These credentials do not match our records!', 'Error');
                return redirect()->back();
            }
        }

        return view('frontend.auth.login');

    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        Session::forget('coupon_amount');
        Session::forget('coupon_code');
        Session::forget('grand_total');
        Session::forget('shipping_charges');
        return redirect('/');
    }
}
