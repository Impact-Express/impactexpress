@extends('layouts.master')

@section('content')
	The Booking
@endsection

@section('styles')
	@parent
	<link rel="stylesheet" href="{{asset('css/bookingHistory.booking.css')}}">
@endsection

@section('scripts')
	<script src="{{asset('js/bookingHistory.booking.js')}}"></script>
@endsection
