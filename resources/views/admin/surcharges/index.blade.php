@extends('layouts.master')

@section('content')
<h3>Surcharges</h3>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/surcharges.index.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/surcharges.index.js')}}"></script>
@endsection