<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function show()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.view', compact('coupons'));
    }

    public function add()
    {
        return view('backend.coupon.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
        ]);

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->type = $request->type;
        $coupon->amount = $request->amount;
        $coupon->status = 1;
        $coupon->save();
        notify()->success("Coupon Added","Success");
        return redirect()->route('admin.view.coupon');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        notify()->success("Coupon Deleted","Success");
        return redirect()->route('admin.view.coupon');
    }

    public function status(Request $request)
    {
        $coupon = Coupon::findOrFail($request->id);
        $coupon->status = $request->status;
        $coupon->save();
        return response()->json(['messege'=>'success']);
    }
}
