<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use LaraIzitoast\Toaster;

class ProfileController extends Controller
{
    public function show()
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        return view('backend.auth.view_profile', compact('admin'));
    }

    public function edit()
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        return view('backend.auth.edit_profile', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30',
            'address' => 'required|min:3|max:30',
            'gender' => 'required',
            'email' => 'required|unique:admins,email,'.$id,
            'mobile' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->address = $request->address;
        $admin->gender = $request->gender;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/profile/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(100, 100)->save($image_url);

            if(file_exists($admin->image)){
                unlink($admin->image);
            }
            $admin->image = $image_url;
        }
        $admin->save();

        notify()->success('Profile Updated', 'Success');
        return redirect()->back();
    }

    public function show_password()
    {
        return view('backend.auth.edit_password');
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:8|max:32',
            'passwordd' => 'required|min:8|max:32',
        ]);

        $hashpassword = Auth::guard('admin')->user()->password;
        if($request->new_password == $request->passwordd){
            if(Hash::check($request->current_password, $hashpassword)){
                if(!Hash::check($request->passwordd, $hashpassword)){
                    $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
                    $admin->password = Hash::make($request->passwordd);
                    $admin->save();

                    Auth::guard('admin')->logout();
                    return redirect()->route('admin');
                }else{
                    notify()->error("Sorry ! New password con not be same as old password!", 'Error');
                    return redirect()->back();
                }
            }else{
                notify()->error("Sorry ! Your Current Password is Wrong", 'Error');
                return redirect()->back();
            }
        }else{
            notify()->error("Password Don't Match", 'Error');
            return redirect()->back();
        }
    }
}
