<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrier;
use App\Models\RemoteArea;

class RemoteAreasController extends Controller
{
    public function index()
    {
        $carriers = Carrier::all()->sortBy('name');

        return view('admin.remoteareas.index', compact('carriers'));
    }
}
