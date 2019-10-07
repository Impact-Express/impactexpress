<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentStatus;

class BookingHistoryController extends Controller
{
    public function index()
    {
        $status_id = ShipmentStatus::where('status', 'manifested')->first()->id;
        $bookings = Shipment::where([
            'user_id' => auth()->id(),
            'status_id' => $status_id
        ])->get();

        return view('customer.bookingHistory.index', compact('bookings'));
    }

    public function booking($id)
    {
        $shipment = Shipment::findOrFail($id);
        if ($shipment->user_id != Auth::id()) {
            abort(404);
        }
        dd($shipment);
        return view('cudtomer.bookingHistory.booking', compact('shipment'));
    }
}
