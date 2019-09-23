@extends('layouts.master')

@section('content')
    <h3>Booking Confirmation</h3>
    <ul id="shipment-items">
        @foreach ($shipments as $shipment)
            <li class="shipment-item">
                <div class="card">
                    <p>Shipment ref: {{$shipment->shipment_ref}}</p>
                    <p>Plus more details blah blah</p>
                </div>
                <div class="card">
                    <a href="{{route('label.serve', ['shipmentUuid' => $shipment->uuid])}}" target="_blank" class="k-button k-primary">Get Labels</a>
                </div>
            </li>
        @endforeach
    </ul>

@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/booking.confirmation.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/booking.confirmation.js')}}"></script>
@endsection
