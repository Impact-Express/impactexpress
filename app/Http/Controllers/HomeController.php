<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('customer.home', compact('user'));
    }
}
