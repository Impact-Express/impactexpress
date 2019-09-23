@extends('layouts.master')

@section('content')
<h3>Customers</h3>
<div id="example">
    <table id="grid">
        <colgroup>
            <col style="width:17%;" />
            <col />
            <col />
            <col />
            <col />
            <col />
        </colgroup>
        <thead>
            <tr>
                <th data-field="name">CUSTOMER NAME</th>
                <th data-field="accounttype">ACCOUNT TYPE</th>
                <th data-field="monthtodate">MONTH TO DATE</th>
                <th data-field="yeartodate">YEAR TO DATE</th>
                <th data-field="moreinfo">EXPOSURE</th>
                <th data-field="actions"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->group->name}}</td>
                    <td>£2875</td>
                    <td>£9783</td>
                    <td>Meh</td>
                    <td><a href="{{route('admin.customers.profile', ['user' => $user->id])}}" class="k-button k-primary"><i class="fas fa-eye"></i></a></td>
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

@section('scripts')
<script src="{{asset('js/customers.js')}}"></script>
@endsection
