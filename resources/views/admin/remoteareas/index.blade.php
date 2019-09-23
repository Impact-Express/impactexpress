@extends('layouts.master')

@section('content')

<h3>Remote Areas</h3>

<div class="panels">
    <div class="panel-1">
        <div id="tabstrip">
            <ul>
                @forelse ($carriers as $carrier)
                    @if ($loop->iteration == 1)
                        <li class="k-state-active">
                            {{$carrier->name}}
                        </li>
                    @else
                        <li>
                            {{$carrier->name}}
                        </li>
                    @endif
                @empty
                    Errr, no carriers!
                @endforelse
            </ul>
            @foreach ($carriers as $carrier)
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
                                <th data-field="country">Country</th>
                                <th data-field="iatacode">IATA Code</th>
                                <th data-field="city">City</th>
                                <th data-field="town">Town</th>
                                <th data-field="postcode">Postcode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carrier->remoteAreas as $area)
                                <tr>
                                    <td>{{$area->country->name}}</td>
                                    <td>{{$area->iata_code}}</td>
                                    <td>{{$area->city}}</td>
                                    <td>{{$area->town}}</td>
                                    <td>{{$area->postcode}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    th.k-header {
        padding: 16px 47px 13px 24px !important;
    }
</style>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/remoteareas.index.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/remoteareas.index.js')}}"></script>
@endsection
