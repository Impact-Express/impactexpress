<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $servicesByCarrier = Service::getServicesByCarrier();

//        dd($servicesByCarrier);

        return view('admin.services.index', compact('servicesByCarrier'));
    }

    public function profile(Service $carrier)
    {
        return view('admin.services.profile', compact('service'));
    }
}
