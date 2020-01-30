@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{asset('css/master.css')}}">
@endsection

@section('master')
<div class="container">
    
  

        <div class="logo-banner">
            <div class="banner-top">
                <div class="logo-img-container"><img class="logo-image" src="assets/images/navbar-logo.png" alt=""></div>
                <div class="logout">
                    <i class="fas fa-lock login-bit"></i>Signed in as {{auth()->user()->name}}  
                    <a class="k-button k-primary login-bit" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="banner-middle">
                <span class="bolder">booking</span>&nbsp;<span class="light">portal</span>
            </div>
            <nav class="main-nav">


                <div class="nav-item">
                    <i class="fas fa-tachometer-alt nav-icon"></i>
                    <div class="nav-link">DASHBOARD</div>
                </div>
                <div class="nav-item">
                    <i class="far fa-user nav-icon"></i>
                    <div class="nav-link">ACCOUNT</div>
                </div>
                <div class="nav-item">
                    <i class="far fa-address-card nav-icon"></i>
                    <div class="nav-link">SAVED ADDRESSES</div>
                </div>
                <div class="nav-item">
                    <i class="fas fa-shipping-fast nav-icon"></i>
                    <div class="nav-link">SEND A PARCEL</div>
                </div>
                <div class="nav-item">
                    <i class="fas fa-shopping-basket nav-icon"></i>
                    <div class="nav-link">BASKET</div>
                </div>
                <div class="nav-item">
                    <i class="fas fa-map-marked-alt nav-icon"></i>
                    <div class="nav-link">TRACK A SHIPMENT</div>
                </div>
                <div class="nav-item">
                    <i class="fas fa-history nav-icon"></i>
                    <div class="nav-link">BOOKING HISTORY</div>
                </div>


               
            </nav>
        </div>
    



    <div id="content">
        @yield('content')
    </div>

</div>

@endsection
