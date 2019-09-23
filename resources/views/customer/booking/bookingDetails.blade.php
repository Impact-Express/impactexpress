@extends('layouts.master')

@section('content')

	<div class="card">
		<h3 class="card-header card-header-primary">{{ __('Shipment Details') }}</h3>
		<div class="card-body">
            <br>
			<form method="post" action="{{route('submit-details')}}" class="booking-form">
				@csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="date" class="bmd-label-floating">Date</label>
                            <input id="date" class="form-control" type="text" name="date" value="{{$shipmentDetails->date}}">
                        </div>
                    </div>
                    <div class="col">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h3>Sender Details</h3>
                        </div>
                        <div class="form-group">
                            <label for="senderContactName" class="bmd-label-floating">Contact Name</label>
                            <input id="senderContactName" class="form-control" type="text" name="senderContactName" value="Richard Bailey">
                        </div>
                        <div class="form-group">
                            <label for="senderCompanyName" class="bmd-label-floating">Company Name</label>
                            <input id="senderCompanyName" class="form-control" type="text" name="senderCompanyName" value="StuffAndThat">
                        </div>
                        <div class="form-group">
                            <label for="senderCountryCode" class="bmd-label-floating">Origin Country</label>
                            <input id="senderCountryCode" class="form-control" type="text" name="senderCountryCode" value="GB" readonly style="background:white;">
                        </div>
                        <div class="form-group">
                            <label for="senderAddressLine1" class="bmd-label-floating">Address Line 1</label>
                            <input id="senderAddressLine1" class="form-control" type="text" name="senderAddressLine1" value="35 Grand Union House">
                        </div>
                        <div class="form-group">
                            <label for="senderAddressLine2" class="bmd-label-floating">Address Line 2</label>
                            <input id="senderAddressLine2" class="form-control" type="text" name="senderAddressLine2" value="The Ridgeway">
                        </div>
                        <div class="form-group">
                            <label for="senderAddressLine3" class="bmd-label-floating">Address Line 3</label>
                            <input id="senderAddressLine3" class="form-control" type="text" name="senderAddressLine3">
                        </div>
                        <div class="form-group">
                            <label for="senderTown" class="bmd-label-floating">Town/City</label>
                            <input id="senderTown" class="form-control" type="text" name="senderTown" value="{{$shipmentDetails->sender_town}}">
                        </div>
                        <div class="form-group">
                            <label for="senderPostcode" class="bmd-label-floating">Origin Postcode</label>
                            <input id="senderPostcode" class="form-control" type="text" name="senderPostcode" value="{{$shipmentDetails->sender_postcode}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h3>Recipient Details</h3>
                        </div>
                        <div class="form-group">
                            <label for="recipientContactName" class="bmd-label-floating">Contact Name</label>
                            <input id="recipientContactName" class="form-control" type="text" name="recipientContactName" value="Steve Stevens">
                        </div>
                        <div class="form-group">
                            <label for="recipientCompanyName" class="bmd-label-floating">Company Name</label>
                            <input id="recipientCompanyName" class="form-control" type="text" name="recipientCompanyName" value="Silly Buggers">
                        </div>
                        <div class="form-group">
                            <label for="recipientCountryCode" class="bmd-label-floating">Destination Country</label>
                            <input id="recipientCountryCode" class="form-control" type="text" name="recipientCountryCode" value="{{$shipmentDetails->recipientCountry->code}}">
                        </div>
                        <div class="form-group">
                            <label for="recipientAddressLine1" class="bmd-label-floating">Address Line 1</label>
                            <input id="recipientAddressLine1" class="form-control" type="text" name="recipientAddressLine1" value="Flat 58 The Tower">
                        </div>
                        <div class="form-group">
                            <label for="recipientAddressLine2" class="bmd-label-floating">Address Line 2</label>
                            <input id="recipientAddressLine2" class="form-control" type="text" name="recipientAddressLine2" value="1285 Long Street">
                        </div>
                        <div class="form-group">
                            <label for="recipientAddressLine3" class="bmd-label-floating">Address Line 3</label>
                            <input id="recipientAddressLine3" class="form-control" type="text" name="recipientAddressLine3" value="The Village">
                        </div>
                        <div class="form-group">
                            <label for="recipientTown" class="bmd-label-floating">Town/City</label>
                            <input id="recipientTown" class="form-control" type="text" name="recipientTown" value="{{$shipmentDetails->recipient_town}}">
                        </div>
                        <div class="form-group">
                            <label for="recipientPostcode" class="bmd-label-floating">Destination Postcode</label>
                            <input id="recipientPostcode" class="form-control" type="text" name="recipientPostcode" value="{{$shipmentDetails->recipient_postcode}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <br>
                        <input type="hidden" name="uuid" value="{{$shipmentDetails->uuid}}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-parcel">Submit</button>
                        </div>
                    </div>
                </div>
			</form>
		</div>
	</div>
@endsection
