<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function scratchPad()
    {


        return view('sketch');
    }
}
