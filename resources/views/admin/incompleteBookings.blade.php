@extends('layouts.master')

@section('content')
	<h1>Incomplete Bookings</h1>
<ul>
	@foreach ($bookings as $booking)
		<li>
			<p>{{ $booking->user->name }}</p>
		</li>
	@endforeach
</ul>
@endsection