@extends('layouts.master')

@section('content')
<h3>Available Services</h3>
<table class="table">
    <tr>
        <th>Provider</th>
        <th>Product Name</th>
        <th>Estimated Delivery</th>
        <th>Booking Cut-off</th>
        <th>Price</th>
        <th></th>
    </tr>
    @forelse($capability as $index => $service)
        <tr>
            <td><img style="width:100px;" src="{{asset('images/'.$service->capability['carrier'].'.png')}}" alt="Provider"></td>
            <td>{{ $service->capability['short_name'] }}</td>
            <td>{{ $service->capability['est_delivery'] }}</td>
            <td>{{ $service->capability['latest_booking'] }}</td>
            <td>£{{ $service->capability['price'] }}</td>
            <td>
                <form method="POST" action="{{route('choose-service')}}">
                    @csrf
                    <input type="hidden" name="service" value="{{ $index }}" >
                    <button class="k-button k-primary">Select</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td>There are no services available for the input provided.</td></tr>
    @endforelse
</table>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/booking.service.css')}}">
@endsection