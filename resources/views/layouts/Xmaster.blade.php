@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{asset('css/master.css')}}">
@endsection

@section('master')
<!-- SIDEBAR ------------------------------------------------------------------------------------------------------- -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Impact Express</h3>
        </div>
        <ul class="components">
            @ifCustomer
                <li class="nav-item dashboard-nav active">
                    <a class="k-link" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item account-nav">
                    <a class="k-link" href="{{route('account.index')}}">
                        <i class="fas fa-user-alt"></i>
                        <span>Account</span>
                    </a>
                </li>
                <li class="nav-item addresses-nav">
                    <a class="k-link" href="{{route('addresses')}}">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Saved Addresses</span>
                    </a>
                </li>
                <li class="nav-item booking-nav">
                    <a class="k-link" href="{{route('send-a-parcel')}}">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Send a Parcel</span>
                    </a>
                </li>
                <li class="nav-item basket-nav">
                    <a class="k-link" href="{{route('review-shipments')}}">
                        <i class="fas fa-shopping-basket"></i>
                        <span>Basket</span>
                    </a>
                </li>
                <li class="nav-item tracking-nav">
                    <a class="k-link" href="{{route('tracking')}}">
                        <i class="fas fa-truck-loading"></i>
                        <span>Track a Shipment</span>
                    </a>
                </li>
                <li class="nav-item booking-history-nav">
                    <a class="k-link" href="{{route('booking-history')}}">
                        <i class="fas fa-boxes"></i>
                        <span>Booking History</span>
                    </a>
                </li>
                <li class="nav-item logout-nav">
                    <a class="k-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
            @ifAdmin
                <li class="nav-item dashboard-nav active">
                    <a class="k-link" href="{{route('admin.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dashboard-nav active">
                    <a class="k-link" href="{{route('admin.carriers.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Carriers</span>
                    </a>
                </li>
                <li class="nav-item services-nav active">
                    <a class="k-link" href="{{route('admin.services.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li class="nav-item dashboard-nav active">
                    <a class="k-link" href="{{route('admin.tariffs.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tariffs</span>
                    </a>
                </li>
                <li class="nav-item customers-nav active">
                    <a class="k-link" href="{{route('accounts.customers')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item surcharges-nav active">
                    <a class="k-link" href="{{route('admin.surcharges.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Surcharges</span>
                    </a>
                </li>
                <li class="nav-item shipments-nav active">
                    <a class="k-link" href="{{route('admin.shipments.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Shipments</span>
                    </a>
                </li>
                <li class="nav-item remote-areas-nav active">
                    <a class="k-link" href="{{route('admin.remoteareas.index')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Remote Areas</span>
                    </a>
                </li>
                <li class="nav-item customers-nav active">
                    <a class="k-link" href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li class="nav-item logout-nav">
                    <a class="k-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
        </ul>
    </nav>
    <nav class="mobile-nav">
        <ul class="mobile-nav-items">
            @ifCustomer
                <li>
                    <a class="k-link" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="k-link" href="{{route('account.index')}}">
                        <i class="fas fa-user-alt"></i>
                        <span>Account</span>
                    </a>
                </li>
                <li>
                    <a class="k-link" href="{{route('addresses')}}">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Saved Addresses</span>
                    </a>
                </li>
                <li>
                    <a class="k-link" href="{{route('send-a-parcel')}}">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Send a Parcel</span>
                    </a>
                </li>
                <li>
                    <a class="k-link" href="{{route('tracking')}}">
                        <i class="fas fa-truck-loading"></i>
                        <span>Track a Shipment</span>
                    </a>
                </li>
                <li>
                    <a class="k-link" href="{{route('booking-history')}}">
                        <i class="fas fa-boxes"></i>
                        <span>Booking History</span>
                    </a>
                </li>
            @endif
            @ifAdmin
                <li>
                    <a class="k-link" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="k-link" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tariffs</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
<!-- END SIDEBAR --------------------------------------------------------------------------------------------------- -->
    <div id="content">
        <button type="button" class="hamburger k-button k-primary">
            <i class="fas fa-bars"></i>
        </button>
        @yield('content')
    </div>
@endsection
