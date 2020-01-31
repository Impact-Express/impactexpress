@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{asset('css/master.css')}}">
@endsection

@section('master')
<div class="container">
    
  

        <div class="logo-banner">
            <div class="banner-top">
                <div class="logo-img-container"><img class="logo-image" src="/assets/images/navbar-logo.png" alt=""></div>
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
                    <a href="{{route('home')}}"><div class="nav-link nav-home">DASHBOARD</div></a>
                </div>
                <div class="nav-item">
                    <i class="far fa-user nav-icon"></i>
                    <a href="{{route('account.index')}}"><div class="nav-link nav-account">ACCOUNT</div></a>
                </div>
                <div class="nav-item">
                    <i class="far fa-address-card nav-icon"></i>
                    <a href="{{route('addresses')}}"><div class="nav-link nav-address">SAVED ADDRESSES</div></a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-shipping-fast nav-icon"></i>
                    <a href="{{route('send-a-parcel')}}"><div class="nav-link nav-parcel">SEND A PARCEL</div></a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-shopping-basket nav-icon"></i>
                    <a href="{{route('review-shipments')}}"><div class="nav-link nav-basket">BASKET</div></a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-map-marked-alt nav-icon"></i>
                    <a href="{{route('tracking')}}"><div class="nav-link nav-tracking">TRACK A SHIPMENT</div></a>
                </div>
                <div class="nav-item">
                    <i class="fas fa-history nav-icon"></i>
                    <a href="{{route('booking-history')}}"><div class="nav-link nav-history">BOOKING HISTORY</div></a>
                </div>
            </nav>
        </div>




    <div class="content">
        <div class="content-inner">
            @yield('content')
        </div>
    </div>

</div>

@section('scripts')
    <script src="{{asset('js/master.js')}}"></script>
@endsection

@endsection
