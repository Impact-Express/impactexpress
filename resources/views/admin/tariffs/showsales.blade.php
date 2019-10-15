@extends('layouts.master')

@section('content')
<?php
// dd($SalesTariff);
?>
    <div class="panels">
        <div class="panel-1">
            <div class="panel-1a">
                <ul>
                    <li>
                        <span>Name: {{ $SalesTariff->name }}</span>
                    </li>
                    <li>
                        <span>Carrier: {{ $SalesTariff->carrier->name }}</span>
                    </li>
                    <li>
                        <span>Import/Export: {{ $SalesTariff->import_export }}</span>
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
                    <th data-field="weight">Kg</th>
                    <th data-field="zone1">Z1</th>
                    <th data-field="zone2">Z2</th>
                    <th data-field="zone3">Z3</th>
                    <th data-field="zone4">Z4</th>
                    <th data-field="zone5">Z5</th>
                    <th data-field="zone6">Z6</th>
                    <th data-field="zone7">Z7</th>
                    <th data-field="zone8">Z8</th>
                    <th data-field="zone9">Z9</th>
                    <th data-field="zone10">Z10</th>
                </tr>
                </thead>
                <tbody>
                @foreach($SalesTariff->valuesByWeight as $weight => $values)
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
