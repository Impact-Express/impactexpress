@extends('layouts.master')

@section('content')

    <div class="panels">
        <div class="panel-1">
            <div class="panel-1a">
                <ul>
                    <li>
                        <span>Name: {{ $tariff->name }}</span>
                    </li>
                    <li>
                        <span>Carrier: {{ $tariff->carrier->name }}</span>
                    </li>
                </ul>
            </div>
            <div class="panel-1b">

            </div>
        </div>
        <div class="panel-2">
            <table id="grid">
                <colgroup>
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                </colgroup>
                <thead>
                <tr>
                    <th data-field="weight">WEIGHT</th>
                    <th data-field="zone1">ZONE 1</th>
                    <th data-field="zone2">ZONE 2</th>
                    <th data-field="zone3">ZONE 3</th>
                    <th data-field="zone4">ZONE 4</th>
                    <th data-field="zone5">ZONE 5</th>
                    <th data-field="zone6">ZONE 6</th>
                    <th data-field="zone7">ZONE 7</th>
                    <th data-field="zone8">ZONE 8</th>
                    <th data-field="zone9">ZONE 9</th>
                    <th data-field="zone10">ZONE 10</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tariff->valuesByWeight as $weight => $values)
                    <tr>
                        <td>{{$weight}}</td>
                        <td>{{$values['zone1']}}</td>
                        <td>{{$values['zone2']}}</td>
                        <td>{{$values['zone3']}}</td>
                        <td>{{$values['zone4']}}</td>
                        <td>{{$values['zone5']}}</td>
                        <td>{{$values['zone6']}}</td>
                        <td>{{$values['zone7']}}</td>
                        <td>{{$values['zone8']}}</td>
                        <td>{{$values['zone9']}}</td>
                        <td>{{$values['zone10']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
    <link rel="stylesheet" href="{{asset('css/tariff.view.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/tariff.view.js')}}"></script>
@endsection
