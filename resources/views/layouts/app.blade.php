<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   
    <link rel="stylesheet" href="{{asset('css/kendo/kendo.common.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/kendo/kendo.material-v2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('styles')
    <title>Laravel</title>
</head>
<body>
    <div class="wrapper">
        @yield('master')
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</html>