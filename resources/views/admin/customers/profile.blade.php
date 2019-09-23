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
                            <col style="width:110px" />
                            <col style="width:120px" />
                            <col style="width:130px" />
                        </colgroup>
                        <thead>
                        <tr>
                            <th data-field="make">Car Make</th>
                            <th data-field="model">Car Model</th>
                            <th data-field="year">Year</th>
                            <th data-field="category">Category</th>
                            <th data-field="airconditioner">Air Conditioner</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Volvo</td>
                                <td>S60</td>
                                <td>2010</td>
                                <td>Saloon</td>
                                <td>Yes</td>
                            </tr>
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
