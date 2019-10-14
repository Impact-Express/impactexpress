@extends('layouts.master')

@section('content')

<h3>Carrier</h3>

<div class="panels">
    <div class="panel-1">
        <div class="panel-1a">
            <ul>
                <li>Name: {{$carrier->name}}</li>
                <li>
                    <span>Status: {{ucfirst($carrier->status)}}</span><div id="statusModalBtn" class="edit-btn"><a class="k-button k-primary" href="#">{{$carrier->status === 'active' ? 'Deactivate' : 'Activate' }}</a></div>
                    <!-- Modal -->
                        <div id="statusFormModal" class="modal">
                            <div class="modal-content">
                                <span class="statusModalClose close">&times;</span>
                                <form method="POST" action="{{route('admin.carriers.toggleStatus')}}">
                                    @csrf
                                    <div class="k-content">
                                        <ul class="fieldlist">
                                            <li>
                                                <p>Are you sure you want to {{$carrier->status === 'active' ? 'deactivate' : 'activate' }} {{ $carrier->name }}?</p>
                                                <p style="padding-top: 1em; text-align: right">
                                                    <input type="text" name="id" value="{{$carrier->id}}" hidden>
                                                    <button type="submit" class="k-button k-primary">Submit</button>
                                                    <a class="statusModalCloseButton k-button" >Cancel</a>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- End Modal -->
                </li>
                <li>
                    <span>Remote Areas</span><a class="k-button k-primary">View</a>
                </li>
                <li>
                    <span>API Details</span><button class="k-button k-primary">View</button>
                </li>
            </ul>
        </div>
        <div class="panel-1b">
            
        </div>
    </div>
    <div class="panel-2">
        <div id="tabstrip">
            <ul>
                <li class="k-state-active">
                    Shipments
                </li>
                <li>
                    Tariffs
                </li>
                <li>
                    Surcharges
                </li>
                <li>
                    Tab 4
                </li>
            </ul>
            <div>
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
                        <th data-field="awb">Airwaybill No</th>
                        <th data-field="date">Date</th>
                        <th data-field="sender">Sender</th>
                        <th data-field="recipient">Recipient</th>
                        <th data-field="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrier->shipments as $shipment)
                            <tr>
                                <td>{{$shipment->shipment_ref}}</td>
                                <td>{{$shipment->airwaybill_number}}</td>
                                <td>{{$shipment->date}}</td>
                                <td>{{$shipment->sender_company_name}}</td>
                                <td>{{$shipment->recipient_company_name}}</td>
                                <td><a class="k-button k-primary" href="{{route('admin.shipment.info', $shipment->uuid)}}"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <table class="grid">
                    <colgroup>
                        <col />
                        <col />
                        <col />
                    </colgroup>
                    <thead>
                    <tr>
                        <th data-field="name">Name</th>
                        <th data-field="import-export">Import/Export</th>
                        <th data-field="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrier->salesTariffs as $salesTariff)
                            <tr>
                                <td>{{$salesTariff->name}}</td>
                                <td>{{$salesTariff->import_export}}</td>
                                <td><a class="k-button k-primary" href="{{route('home')}}"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <table class="grid">
                    <colgroup>
                        <col style="width:300px" />
                        <col />
                        <col style="width:200px" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th data-field="name">Name</th>
                        <th data-field="description">Description</th>
                        <th data-field="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Remote Area</td>
                            <td>Charge for delivery to remote areas. £0.38 per kg. Minimum charge £19.00 per shipment.</td>
                            <td><a href="{{route('home')}}" class="k-button k-primary"><i class="fas fa-eye"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                Tab 4
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/carrier.profile.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/carrier.profile.js')}}"></script>
@endsection
