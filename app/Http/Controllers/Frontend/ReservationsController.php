<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\OrderTime;
use App\Model\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index()
    {
        $order_times = OrderTime::where('status', 1)->get();
        return view('frontend.reservations', compact('order_times'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'number' => 'required',
           'email' => 'required',
           'numberOfGuest' => 'required',
           'date' => 'required',
           'time' => 'required',
           'message' => 'required',
        ]);

        $reservations = new Reservation();
        $reservations->name = $request->name;
        $reservations->number = $request->number;
        $reservations->email = $request->email;
        $reservations->numberOfGuest = $request->numberOfGuest;
        $reservations->date = date('Y-m-d', strtotime($request->date));
        $reservations->time = $request->time;
        $reservations->message = $request->message;
        $reservations->status = 'Pending';
        $reservations->save();
        notify()->success('Reservation Submitted','Success');
        return redirect()->back();
    }
}
