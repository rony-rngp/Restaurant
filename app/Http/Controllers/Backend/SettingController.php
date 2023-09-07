<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\MinMaxAmount;
use App\Model\OrderTime;
use App\Model\PaymentMethod;
use App\Model\ShippingCharges;
use App\Model\WebsiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show_order_time()
    {
        $order_times = OrderTime::all();
        return view('backend.settings.order_time.show_order_time', compact('order_times'));
    }

    public function store_order_time(Request $request)
    {
        if($request->name == ''){
            notify()->error('Filed must not ne empty :(');
            return redirect()->back();
        }

        $order_time = new OrderTime();
        $order_time->name = $request->name;
        $order_time->status = 1;
        $order_time->save();
        notify()->success('Time added', 'Success');
        return redirect()->back();

    }

    public function status_order_time(Request $request)
    {
        $order_time = OrderTime::find($request->id);
        $order_time->status = $request->status;
        $order_time->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy_order_time($id)
    {
        $order_time = OrderTime::findOrFail($id);
        $order_time->delete();
        notify()->success('Time Deleted', 'Success');
        return redirect()->back();
    }

    //------Payment Setting----
    public function show_payment_setting()
    {
        $payment_settings = PaymentMethod::all();
        return view('backend.settings.payment_setting.show_payment_setting', compact('payment_settings'));
    }

    public function status_payment_setting(Request $request)
    {
        $payment_setting = PaymentMethod::find($request->id);
        $payment_setting->status = $request->status;
        $payment_setting->save();
        return response()->json(['messege' => 'success']);
    }

    public function shipping_charges()
    {
        $shipping_charges = ShippingCharges::find(1);
        return view('backend.settings.shipping_charge.view_shipping_charges', compact('shipping_charges'));
    }

    public function shipping_charges_edit($id)
    {
        $shipping_charges = ShippingCharges::find($id);
        return view('backend.settings.shipping_charge.edit_shipping_charges', compact('shipping_charges'));
    }

    public function shipping_charges_update(Request $request, $id)
    {
        $this->validate($request, [
            'shipping_charges' => 'required|numeric'
        ]);
        $shipping_charges = ShippingCharges::find($id);
        $shipping_charges->shipping_charges = $request->shipping_charges;
        $shipping_charges->save();

        notify()->success('Shipping Updated', 'Success');
        return redirect()->route('admin.view.shipping.charges');
    }

    public function show_min_max()
    {
        $min_maxes = MinMaxAmount::all();
        return view('backend.settings.min_max.view_min_max', compact('min_maxes'));
    }

    public function edit_min_max($id)
    {
        $min_max = MinMaxAmount::find($id);
        return view('backend.settings.min_max.edit_min_max', compact('min_max'));
    }

    public function update_min_max(Request $request, $id)
    {
        $this->validate($request, [
           'min_amount' => 'required|numeric',
           'max_amount' => 'required|numeric'
        ]);
        $min_max = MinMaxAmount::find($id);
        $min_max->min_amount = $request->min_amount;
        $min_max->max_amount = $request->max_amount;
        $min_max->save();
        notify()->success('Amount Updated', 'Success');
        return redirect()->route('admin.view.min_max');
    }

    public function show_website_setting()
    {
        $website_setting = WebsiteSetting::find(1);
        return view('backend.settings.website_setting.view',compact('website_setting'));
    }

    public function update_website_setting(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required',
           'address' => 'required',
           'phone' => 'required',
           'email' => 'required',
           'facebook' => 'required',
           'google_plus' => 'required',
           'twitter' => 'required',
        ]);

        $website_setting = WebsiteSetting::find($id);
        $website_setting->name = $request->name;
        $website_setting->address = $request->address;
        $website_setting->phone = $request->phone;
        $website_setting->email = $request->email;
        $website_setting->facebook = $request->facebook;
        $website_setting->google_plus = $request->google_plus;
        $website_setting->twitter = $request->twitter;
        $website_setting->save();

        notify()->success('Setting Updated', 'Success');
        return redirect()->back();

    }
}
