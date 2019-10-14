@extends('layouts.master')

@section('content')

    <div class="panels">
        <div class="panel-1">
            <div class="panel-1a">
                <ul>
                    <li>
                        <span>Name: {{$user->name}}</span>
                    </li>
                    <li>
                        <span>Bleh</span>
                    </li>
                    <li>
                        <span>Meh</span>
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
                        Tab 3
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
                        </colgroup>
                        <thead>
                        <tr>
                            <th data-field="ref">Our Ref</th>
                            <th data-field="carrier">Carrier</th>
                            <th data-field="awb">Airwaybill No</th>
                            <th data-field="date">Recipient</th>
                            <th data-field="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->shipments as $shipment)
                            <tr>
                                <td>{{$shipment->shipment_ref}}</td>
                                <td>{{$shipment->carrier->name}}</td>
                                <td>{{$shipment->airwaybill_number}}</td>
                                <td>{{$shipment->recipient_company_name}}</td>
                                <td><a class="k-button k-primary" href="{{route('admin.shipment.info', $shipment->uuid)}}"><i class="fas fa-eye"></i></a></td>
                            </tr>
                            @empty
                            No Shipments
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    <div id="sub-tabstrip">
                        <ul>
                            @foreach ($tariffs as $carrier => $services)
                                @if ($loop->iteration == 1)
                                    <li class="k-state-active">
                                        {{$carrier}}
                                    </li>
                                @else
                                    <li class="k-state">
                                        {{$carrier}}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        @foreach ($tariffs as $carrier => $services)
                            <div>
                                <table class="sub-grid">
                                    <colgroup>
                                        <col />
                                        <col />
                                        <col />
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th data-field="name">Service</th>
                                        <th data-field="tariff">Tariff</th>
                                        <th data-field="actions"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service => $tariff)
                                            <tr>
                                                <td>{{$service}}</td>
                                                <td>{{$tariff[0]}}</td>
                                                <td><a href="#" class="k-button k-primary"><i class="fas fa-edit"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    Tab 3
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
    <link rel="stylesheet" href="{{asset('css/customer.profile.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/customer.profile.js')}}"></script>
@endsection
