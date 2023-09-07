<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Logo;
use App\Model\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function show()
    {
        $sliders = Slider::all();
        return view('backend.slider.view_slider', compact('sliders'));
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit_slider', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5048',
        ]);

        $slider = Slider::findOrFail($id);

        //Product Image
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/slider/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(1600, 583)->save($image_url);
            if(file_exists($slider->image)){
                unlink($slider->image);
            }
            $slider->image = $image_url;
        }
        $slider->save();
        notify()->success("Slider Updated","Success");
        return redirect()->route('admin.view.slider');
    }

    public function show_logo()
    {
        $logs = Logo::all();
        return view('backend.logo.view_logo', compact('logs'));
    }

    public function edit_logo($id)
    {
        $logo = Logo::findOrFail($id);
        return view('backend.logo.edit_logo', compact('logo'));
    }

    public function update_logo(Request $request, $id)
    {

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,jpg,png,gif|max:5048',
            'favicon' => 'image|mimes:jpeg,jpg,png,gif|max:5048',
        ]);

        $logo = Logo::findOrFail($id);

        //Logo
        $image = $request->file('logo');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/logo/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(130, 50)->save($image_url);
            if(file_exists($logo->logo)){
                unlink($logo->logo);
            }
            $logo->logo = $image_url;
        }

        //Logo
        $image = $request->file('favicon');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/favicon/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(32, 32)->save($image_url);
            if(file_exists($logo->favicon)){
                unlink($logo->favicon);
            }
            $logo->favicon = $image_url;
        }

        $logo->save();
        notify()->success("Logo and Favicon Updated","Success");
        return redirect()->route('admin.view.logo');
    }
}
