@extends('layouts.master')

@section('content')
<h3>Services</h3>
<div class="panels">
    <div id="tabstrip">
        <ul>
            @forelse ($servicesByCarrier as $carrier => $services)
                @if ($loop->first)
                    <li class="k-state-active">
                        {{$carrier}}
                    </li>
                @else
                    <li class="k-state">
                        {{$carrier}}
                    </li>
                @endif
            @empty
                No carriers found
            @endforelse
        </ul>
        @forelse ($servicesByCarrier as $carrier => $services)
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
                        <th data-field="tariff">Default Sales Tariff</th>
                        <th data-field="actions"></th>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td>{{ucfirst($service->name)}}</td>
                                <td>{{$service->defaultSalesTariff->name}}</td>
                                <td>
                                    <a href="#" class="k-button k-primary"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @empty
                            No services found
                        @endforelse
                    </tbody>
                </table>
            </div>
        @empty
        @endforelse
    </div>
</div>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/services.index.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/services.index.js')}}"></script>
@endsection
