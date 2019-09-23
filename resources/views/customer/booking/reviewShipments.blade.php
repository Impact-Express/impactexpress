@extends('layouts.master')

@section('content')
<h3>Booking Summary</h3>
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Service</th>
            <th>Number of pieces</th>
            <th class="text-right">Price</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shipments as $shipment)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td>{{ucwords($shipment->service->short_name)}}</td>
                <td>{{$shipment->pieces->count()}}</td>
                <td class="text-right">&pound;{{number_format($shipment->price, 2)}}</td>
                <td class="td-actions text-right">
                    <button type="button" class="open-modal k-button k-primary" data-modal="{{$loop->iteration}}">
                        <i class="far fa-eye"></i>
                    </button>
                    <button type="button" class="k-button">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
<!-- START DETAILS MODAL ---------------------------------------------------------------------------------------------->
            <div id="details-modal__{{$loop->iteration}}" class="modal">
                <div class="modal-content">
                    <span class="close-modal close" data-modal="{{$loop->iteration}}">&times;</span>
                    <p>Pieces: {{$shipment->pieces->count()}}</p>
                    <p>Service: {{ucwords($shipment->service->short_name)}}</p>
                    <div class="row">
                        <div class="col">
                            <p>Sender</p>
                            <p>{{$shipment->sender_contact_name}}</p>
                            <p>{{$shipment->sender_company_name}}</p>
                            <p>{{$shipment->sender_address_line_1}}</p>
                            <p>{{$shipment->sender_address_line_2}}</p>
                            <p>{{$shipment->sender_address_line_3}}</p>
                            <p>{{$shipment->sender_town}}</p>
                            <p>{{$shipment->sender_postcode}}</p>
                            <p>{{$shipment->senderCountry->code}}</p>
                        </div>
                        <div class="col">
                            <p>Recipient</p>
                            <p>{{$shipment->recipient_contact_name}}</p>
                            <p>{{$shipment->recipient_company_name}}</p>
                            <p>{{$shipment->recipient_address_line_1}}</p>
                            <p>{{$shipment->recipient_address_line_2}}</p>
                            <p>{{$shipment->recipient_address_line_3}}</p>
                            <p>{{$shipment->recipient_town}}</p>
                            <p>{{$shipment->recipient_postcode}}</p>
                            <p>{{$shipment->recipientCountry->code}}</p>
                        </div>
                    </div>
                    <p>Price: &pound;{{number_format($shipment->price, 2)}}</p>
                </div>
            </div>
<!-- END DETAILS MODAL ------------------------------------------------------------------------------------------------>
<!-- START DELETE MODAL ----------------------------------------------------------------------------------------------->

<!-- END DELETE MODAL ------------------------------------------------------------------------------------------------->
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td class="text-right">Total:</td>
            <td class="text-right">&pound;{{number_format($totalPrice, 2)}}</td>
        </tr>
    </tbody>
</table>
<form method="POST" action="{{route('booking.confirm')}}">
    @csrf
    <button type="submit" class="k-button k-primary">Confirm</button>
</form>
<a href="{{route('send-a-parcel')}}" class="k-button">Add another shipment</a>
@endsection
@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/bookings.review.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/bookings.review.js')}}"></script>
@endsection