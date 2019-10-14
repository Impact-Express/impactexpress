@extends('layouts.master')

@section('content')
<h3>Tariffs</h3>

<!-- Open The Modal -->
<button class="k-button k-primary" id="modalBtnSales">Add a new sales tariff</button>
<button class="k-button k-primary" id="modalBtnCost">Add a new cost tariff</button>

<!-- The Modal -->
<div id="formModalSales" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="closeSales" class="close">&times;</span>
        <form method="POST" action="{{route('admin.tariffs.storeSales')}}">
            @csrf
            <div class="k-content">
                <ul class="fieldlist">
                    <li>
                        <label for="tariffName">New Sales Tariff Name</label>
                        <input name="name" id="tariffName" type="text" class="k-textbox" style="width: 100%;" />
                    </li>
                    <li>
                        <select class="k-textbox" name="carrier">
                            <option value="">Select carrier...</option>
                            @foreach ($carriers as $carrier)
                                <option value="{{$carrier->id}}">{{$carrier->name}}</option>
                            @endforeach
                        </select>
                    </li>
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
                        <span>Export</span>
                        <div style="display:inline-block;">
                            <label class="switch">
                                <input name="import" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <span>Import</span>
                    </li>
                    <li>
                        <div class="k-content">
                            <input name="file" id="files1" type="file" aria-label="files" class="files" />
                            <p style="padding-top: 1em; text-align: right">
                                <button type="submit" class="k-button k-primary">Submit</button>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>
<div id="formModalCost" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="closeCost" class="close">&times;</span>
        <form method="POST" action="{{route('admin.tariffs.storeCost')}}">
            @csrf
            <div class="k-content">
                <ul class="fieldlist">
                    <li>
                        <label for="tariffName">New Cost Tariff Name</label>
                        <input name="name" id="tariffName" type="text" class="k-textbox" style="width: 100%;" />
                    </li>
                    <li>
                        <select class="k-textbox" name="carrier">
                            <option value="">Select carrier...</option>
                            @foreach ($carriers as $carrier)
                                <option value="{{$carrier->id}}">{{$carrier->name}}</option>
                            @endforeach
                        </select>
                    </li>
                    <li>
                        <div id="account-select">
                            <br>
                            <select class="k-textbox" name="accountNumber">
                                <option value="">Select an account...</option>
                                @foreach ($accountNumbers as $num)
                                    <option value="{{$num->id}}">{{$num->name." - ".$num->number}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
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
                        <span>Export</span>
                        <div style="display:inline-block;">
                            <label class="switch">
                                <input name="import" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <span>Import</span>
                    </li>
                    <li>
                        <div class="k-content">
                            <input name="file" id="files2" type="file" aria-label="files" class="files" />
                            <p style="padding-top: 1em; text-align: right">
                                <button type="submit" class="k-button k-primary">Submit</button>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>
<!-- The Modal -->
<br>
<br>
<div id="example">
    <table id="grid">
        <colgroup>
            <col />
            <col />
            <col />
            <col />
            <col />
        </colgroup>
        <thead>
        <tr>
            <th data-field="name">NAME</th>
            <th data-field="carrier">CARRIER</th>
            <th data-field="import_export">IMPORT/EXPORT</th>
            <th data-field="sales_cost">SALES/COST</th>
            <th data-field="actions"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesTariffs as $salesTariff)
            <tr>
                <td>{{$salesTariff->name}}</td>
                <td>{{$salesTariff->carrier->name}}</td>
                <td>{{ucfirst($salesTariff->import_export)}}</td>
                <td>Sales</td>
                <td><a href="{{route('admin.salestariff.show', $salesTariff->id)}}" class="k-button k-primary"><i class="fas fa-eye"></i></a></td>
            </tr>
        @endforeach
        @foreach($costTariffs as $costTariff)
            <tr>
                <td>{{$costTariff->name}}</td>
                <td>{{$costTariff->carrier->name}}</td>
                <td>{{ucfirst($costTariff->import_export)}}</td>
                <td>Cost</td>
                <td><a href="{{route('admin.costtariff.show', $costTariff->id)}}" class="k-button k-primary"><i class="fas fa-eye"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<style>
    th.k-header {
        padding: 16px 47px 13px 24px !important;
    }
</style>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/tariff.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/tariff.js')}}"></script>
@endsection