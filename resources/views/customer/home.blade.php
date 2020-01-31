@extends('layouts.master')

@section('content')
    <style>.nav-home{background:#e3e3e3;}</style>
    <h3>Welcome, {{ $user->name }}</h3>
@endsection
