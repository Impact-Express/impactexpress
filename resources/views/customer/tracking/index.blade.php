@extends('layouts.master')

@section('content')
<style>.nav-tracking{background:#e3e3e3;}</style>
    <h3>Tracking</h3>
    <form method="POST" action="{{route('tracking-results')}}">
        @csrf
        <div class="form-group">
            <label for="ref" class="">Tracking Number</label>
            <div>
                <input id="ref" type="text" class="form-control" name="ref" required>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <button class="" type="submit" name="trackingSubmit">Find</button>
        </div>
    </form>
@endsection