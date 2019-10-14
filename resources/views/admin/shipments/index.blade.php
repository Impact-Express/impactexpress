@extends('layouts.master')

@section('content')
<h3>Shipments</h3>
<table class="grid">
    <colgroup>
        <col />
        <col />
        <col />
        <col />
        <col />
        <col />
    </colgroup>
    <thead>
    <tr>
        <th data-field="ref">Our Ref</th>
        <th data-field="carrier">Carrier</th>
        <th data-field="model">Airwaybill No</th>
        <th data-field="year">Date</th>
        <th data-field="category">Sender</th>
        <th data-field="airconditioner">Recipient</th>
        <th data-field="actions"></th>
    </tr>
    </thead>
    <tbody>
        @forelse ($shipments as $shipment)
        <tr>
            <td>{{$shipment->shipment_ref}}</td>
            <td>{{$shipment->carrier->name}}</td>
            <td>{{$shipment->airwaybill_number}}</td>
            <td>{{$shipment->date}}</td>
            <td>{{$shipment->sender_company_name}}</td>
            <td>{{$shipment->recipient_company_name}}</td>
            <td><a class="k-button k-primary" href="{{route('admin.shipment.info', $shipment->uuid)}}"><i class="fas fa-eye"></i></a></td>
        </tr>
        @empty
        No shipments
        Do some sellin sukka!
        @endforelse
    </tbody>
</table>
<style>
    th.k-header {
        padding: 16px 47px 13px 24px !important;
    }
</style>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/admin.shipments.index.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/admin.shipments.index.js')}}"></script>
@endsection