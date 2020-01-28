@extends('layouts.master')

@section('content')
<?php
// for dev purposes only
use Carbon\Carbon;
?>
<form method="POST" action="{{route('rate-request')}}" class="booking-form">
	@csrf
	<div class="booking-form">
		<ul class="fieldlist date">
			<li>
				<label for="date">Date</label>
				<input id="date" type="text" name="date" class="k-textbox" value="{{Carbon::now()->add(1, 'day')->isoFormat('Y-mm-D')}}">
			</li>
		</ul>

		<div class="address-fields">
			<ul class="fieldlist">
				<h3>Sender Details</h3>
				<li>
					<label for="senderContactTitle">Contact First Name</label>
					<input id="senderContactTitle" type="text" name="senderContactTitle" class="k-textbox" value="Mr">
				</li>
				<li>
					<label for="senderContactFirstName">Contact First Name</label>
					<input id="senderContactFirstName" type="text" name="senderContactFirstName" class="k-textbox" value="Steve">
				</li>
				<li>
					<label for="senderContactLastName">Contact Last Name</label>
					<input id="senderContactLastName" type="text" name="senderContactLastName" class="k-textbox" value="Stevens">
				</li>
				<li>
					<label for="senderCompanyName">Company Name</label>
					<input id="senderCompanyName" type="text" name="senderCompanyName" class="k-textbox" value="StuffAndThat">
				</li>
				<li>
					<label for="senderHouseNumber">House/Flat Number</label>
					<input id="senderHouseNumber" type="text" name="senderHouseNumber" class="k-textbox" value="35">
				</li>
				<li>
					<label for="senderHouseName">House/Building Name</label>
					<input id="senderHouseName" type="text" name="senderHouseName" class="k-textbox" value="Grand Union House">
				</li>
				<li>
					<label for="senderStreetName">Street name</label>
					<input id="senderStreetName" type="text" name="senderStreetName" class="k-textbox" value="The Ridgeway">
				</li>
				<li>
					<label for="senderAddressLine1">Address Line 1</label>
					<input id="senderAddressLine1" type="text" name="senderAddressLine1" class="k-textbox" value="35 Grand Union House">
				</li>
				<li>
					<label for="senderAddressLine2">Address Line 2</label>
					<input id="senderAddressLine2" type="text" name="senderAddressLine2" class="k-textbox" value="The Ridgeway">
				</li>
				<li>
					<label for="senderAddressLine3">Address Line 3</label>
					<input id="senderAddressLine3" type="text" name="senderAddressLine3" class="k-textbox" value="Iver">
				</li>
				<li>
					<label for="senderTown">Town/City</label>
					<input id="senderTown" type="text" name="senderTown" class="k-textbox" value="Slough">
				</li>
				<li>
					<label for="senderCountryCode">Country</label>
					<input id="senderCountryCode" type="text" name="senderCountryCode" class="k-textbox" value="GB" readonly>
				</li>
				<li>
					<label for="senderPostcode">Post Code</label>
					<input id="senderPostcode" type="text" name="senderPostcode" class="k-textbox" value="SL09BU">
				</li>
                <li>
                    <label for="senderHomePhone">Home Phone</label>
                    <input id="senderHomePhone" type="text" name="senderHomePhone" class="k-textbox" value="07987345234">
                </li>
				<li>
                    <label for="senderWorkPhone">Work Phone</label>
                    <input id="senderWorkPhone" type="text" name="senderWorkPhone" class="k-textbox" value="07987345234">
                </li>
				<li>
                    <label for="senderMobilePhone">Mobile Phone</label>
                    <input id="senderMobilePhone" type="text" name="senderMobilePhone" class="k-textbox" value="07987345234">
                </li>
			</ul>

			<ul class="fieldlist">
				<h3>Recipient Details</h3>
				<li>
					<label for="recipientContactTitle">Contact First Name</label>
					<input id="recipientContactTitle" type="text" name="recipientContactTitle" class="k-textbox" value="Mr">
				</li>
				<li>
					<label for="recipientContactFirstName">Contact First Name</label>
					<input id="recipientContactFirstName" type="text" name="recipientContactFirstName" class="k-textbox" value="Robert">
				</li>
				<li>
					<label for="recipientContactLastName">Contact Last Name</label>
					<input id="recipientContactLastName" type="text" name="recipientContactLastName" class="k-textbox" value="Fisher">
				</li>
				<li>
					<label for="recipientCompanyName">Company Name</label>
					<input id="recipientCompanyName" type="text" name="recipientCompanyName" class="k-textbox" value="Bob's Bits">
				</li>
				<li>
					<label for="recipientHouseNumber">House/Flat Number</label>
					<input id="recipientHouseNumber" type="text" name="recipientHouseNumber" class="k-textbox" value="5">
				</li>
				<li>
					<label for="recipientHouseName">House/Building Name</label>
					<input id="recipientHouseName" type="text" name="recipientHouseName" class="k-textbox" value="">
				</li>
				<li>
					<label for="recipientStreetName">Street name</label>
					<input id="recipientStreetName" type="text" name="recipientStreetName" class="k-textbox" value="Some Street">
				</li>
				<li>
					<label for="recipientAddressLine1">Address Line 1</label>
					<input id="recipientAddressLine1" type="text" name="recipientAddressLine1" class="k-textbox" value="5 Some Street">
				</li>
				<li>
					<label for="recipientAddressLine2">Address Line 2</label>
					<input id="recipientAddressLine2" type="text" name="recipientAddressLine2" class="k-textbox" value="">
				</li>
				<li>
					<label for="recipientAddressLine3">Address Line 3</label>
					<input id="recipientAddressLine3" type="text" name="recipientAddressLine3" class="k-textbox" value="">
				</li>
				<li>
					<label for="recipientTown">Town/City</label>
					<input id="recipientTown" type="text" name="recipientTown" class="k-textbox" value="Beverly Hills">
				</li>
				<li>
					<label for="recipientCountryCode">Country</label>
					<input id="recipientCountryCode" type="text" name="recipientCountryCode" class="k-textbox" value="US" readonly>
				</li>
				<li>
					<label for="recipientPostcode">Post Code</label>
					<input id="recipientPostcode" type="text" name="recipientPostcode" class="k-textbox" value="90210">
				</li>
                <li>
                    <label for="recipientHomePhone">Home Phone</label>
                    <input id="recipientHomePhone" type="text" name="recipientHomePhone" class="k-textbox" value="07987345234">
                </li>
				<li>
                    <label for="recipientWorkPhone">Work Phone</label>
                    <input id="recipientWorkPhone" type="text" name="recipientWorkPhone" class="k-textbox" value="07987345234">
                </li>
				<li>
                    <label for="recipientMobilePhone">Mobile Phone</label>
                    <input id="recipientMobilePhone" type="text" name="recipientMobilePhone" class="k-textbox" value="07987345234">
                </li>
			</ul>
		</div>

		<ul class="fieldlist">
			<li>
				<span>Non-documents</span>
				<div style="display:inline-block;">
					<label class="switch">
						<input name="documents" type="checkbox">
						<span class="slider round"></span>
					</label>
				</div>
				<span>Documents</span>
			</li>
			<li>
				<label for="description">Description</label>
				<input id="description" type="text" name="description" class="k-textbox" value="10 lb black ribbed nobbler">
			</li>
			<li>
				<label for="declaredValue">Declared Value</label>
				<input id="declaredValue" type="text" name="declaredValue" class="k-textbox" value="200">
			</li>
			<li>
				<input type="checkbox" id="insuranceCheck" class="k-checkbox" name="insuranceCheck">
				<label class="k-checkbox-label" for="insuranceCheck">Insurance</label>
			</li>
			<li>
				<input type="checkbox" id="non-stack" class="k-checkbox" name="non-stack">
				<label class="k-checkbox-label" for="non-stack">Non-Stack</label>
			</li>
		</ul>
	</div>
	<br>
	<table class="parcels">
		<tbody class="row-container">
		<tr>
			<td class="fieldlist">
				<label for="length__1">Length</label>
				<input id="length__1" type="text" name="parcels[1][length]" value="10">
				<span>cm</span>
			</td>
			<td class="fieldlist">
				<label for="width__1">Width</label>
				<input id="width__1" type="text" name="parcels[1][width]" value="10">
				<span>cm</span>
			</td>
			<td class="fieldlist">
				<label for="height__1">Height</label>
				<input id="height__1" type="text" name="parcels[1][height]" value="10">
				<span>cm</span>
			</td>
			<td class="fieldlist">
				<label for="weight__1">Weight</label>
				<input id="weight__1" type="text" name="parcels[1][weight]" value="1">
				<span>kg</span>
			</td>
		</tr>
		</tbody>
	</table>
	<input type="submit" value="Submit" id="submit-btn" class="k-button k-primary">
	<button type="button" id="add-parcel" class="k-button add-form-field">Add another parcel</button>
</form>
<div class="overlay"></div>
<img class="loader" src="{{asset('images/doggo.gif')}}" alt="Spinner">
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/booking.index.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/booking.index.js')}}"></script>
@endsection
