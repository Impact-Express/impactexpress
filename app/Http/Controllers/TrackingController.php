<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use App\Models\Shipment;
use Illuminate\Http\Request;


class TrackingController extends Controller
{
    public function index()
    {
    	return view('customer.tracking.index');
    }

    public function trackingResults(Request $request)
    {
        $request->validate([
            'ref' => 'required'
        ],[
            'ref' => 'The Tracking Number is required.'
        ]);

        $shipment = Shipment::where('shipment_ref', $request->input('ref'))->first();
//dd($shipment);
$shipment = Shipment::first();
        $trackingData = $shipment->requestTrackingData();

       dd('flibble', $trackingData);

        return view('customer.tracking.trackingResults', compact('trackingData'));
    }
}
