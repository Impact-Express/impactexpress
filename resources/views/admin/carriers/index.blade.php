@extends('layouts.master')

@section('content')
<h3>Carriers</h3>

<!-- Open The Modal -->
<button class="k-button k-primary" id="modalBtn">Add a new Carrier</button>
<br>
<br>
<!-- The Modal -->
<div id="formModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form method="POST" action="{{route('admin.carriers.store')}}">
            @csrf
            <div class="k-content">
                <ul class="fieldlist">
                    <li>
                        <label for="name">New Carrier Name</label>
                        <input name="name" id="name" type="text" class="k-textbox" style="width: 100%;" />
                    </li>
                    <li>
                        <div class="k-content">
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
<div id="example">
    <table id="grid">
        <colgroup>
            <col style="width:17%;" />
            <col />
            <col />
        </colgroup>
        <thead>
        <tr>
            <th data-field="name">CARRIER NAME</th>
            <th data-field="status">STATUS</th>
            <th data-field="actions"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($carriers as $carrier)
            <tr>
                <td>{{$carrier->name}}</td>
                <td>{{$carrier->status === 'active' ? 'ACTIVE' : 'INACTIVE'}}</td>
                <td><a href="{{route('admin.carriers.profile', ['carrier' => $carrier->id])}}" class="k-button k-primary"><i class="fas fa-eye"></i></a></td>
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
    <link rel="stylesheet" href="{{asset('css/carrier.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/carrier.index.js')}}"></script>
@endsection
