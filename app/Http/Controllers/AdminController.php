<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrier;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

}
