<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }

        if($request->isMethod('post')){
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)){
                return redirect()->route('admin.dashboard');
            }
            // if failed, redirect back with form data
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
        return view('backend.auth.login');
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin');
    }
}
