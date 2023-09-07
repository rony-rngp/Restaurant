<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function show()
    {
        $reservations = Reservation::latest()->get();
        return view('backend.reservation.view', compact('reservations'));
    }

    public function details(Request $request)
    {
        $reservation = Reservation::findOrFail($request->id);
        $reservation->is_seen = 1;
        $reservation->save();
        return response()->json($reservation);
    }

    public function status(Request $request)
    {
        $reservation = Reservation::findOrFail($request->id);
        $reservation->status = $request->status;
        $reservation->save();
        notify()->success('Status Deleted', 'Success');
        return redirect()->back();
    }
}
