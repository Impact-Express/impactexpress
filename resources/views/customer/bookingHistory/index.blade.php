@extends('layouts.master')

@section('content')
<style>.nav-history{background:#e3e3e3;}</style>
	<h3>Booking History</h3>
	<ul class="booking-items">
		@forelse ($bookings as $booking)
			<li class="booking-item">
				{{$booking->shipment_ref}}
				<a href="{{route('booking.info', ['id' => $booking->id])}}" class="k-button k-primary"><i class="fas fa-eye"></i></a>
			</li>
		@empty
			Make some Bookings sucka!
		@endforelse
	</ul>
@endsection

@section('styles')
	@parent
	<link rel="stylesheet" href="{{asset('css/bookingHistory.index.css')}}">
@endsection

@section('scripts')
	<script src="{{asset('js/bookingHistory.index.js')}}"></script>
@endsection
