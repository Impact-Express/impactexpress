@extends('layouts.master')

@section('content')
    <h3>Account Details</h3>
    <ul id="account-items">
        <li class="account-item">
            <div class="item-title">Name</div>
            <div class="item-value">{{ e($user->name) }}</div>
            <div id="nameModalBtn" class="edit-btn"><a class="k-button k-primary" href="#">Change</a></div>
        </li>
        <li class="account-item">
            <div class="item-title">Email</div>
            <div class="item-value">{{ e($user->email) }}</div>
            <div id="emailModalBtn" class="edit-btn"><a class="k-button k-primary" href="#">Change</a></div>
        </li>
        <li class="account-item">
            <div class="item-title">Address</div>
            <div class="item-value">--address--</div>
            <div id="addressModalBtn" class="edit-btn"><a class="k-button k-primary" href="#">Change</a></div>
        </li>
        <li class="account-item">
            <div class="item-title">Phone</div>
            <div class="item-value">07856253671</div>
            <div id="phoneModalBtn" class="edit-btn"><a class="k-button k-primary" href="#">Change</a></div>
        </li>
    </ul>

    <div id="nameFormModal" class="modal">
        <div class="modal-content">
            <span class="nameModalClose close">&times;</span>
            <form method="POST" action="{{route('account.update')}}">
                @csrf
                <div class="k-content">
                    <ul class="fieldlist">
                        <li>
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="k-textbox" value="{{ e($user->name) }}" style="width: 100%;" />
                        </li>
                        <li>
                            <p style="padding-top: 1em; text-align: right">
                                <button type="submit" class="k-button k-primary">Submit</button>
                            </p>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div id="emailFormModal" class="modal">
        <div class="modal-content">
            <span class="emailModalClose close">&times;</span>
            <form method="POST" action="{{route('account.update')}}">
                @csrf
                <div class="k-content">
                    <ul class="fieldlist">
                        <li>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="k-textbox" value="{{ e($user->email) }}" style="width: 100%;" />
                        </li>
                        <li>
                            <p style="padding-top: 1em; text-align: right">
                                <button type="submit" class="k-button k-primary">Submit</button>
                            </p>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div id="addressFormModal" class="modal">
        <div class="modal-content">
            <span class="addressModalClose close">&times;</span>
            <form method="POST" action="{{route('account.update')}}">
                @csrf
                <div class="k-content">
                    <ul class="fieldlist">
                        <li>
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="k-textbox" value="TODO: add new address or select from list" style="width: 100%;" />
                        </li>
                        <li>
                            <p style="padding-top: 1em; text-align: right">
                                <button type="submit" class="k-button k-primary">Submit</button>
                            </p>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div id="phoneFormModal" class="modal">
        <div class="modal-content">
            <span class="phoneModalClose close">&times;</span>
            <form method="POST" action="{{route('account.update')}}">
                @csrf
                <div class="k-content">
                    <ul class="fieldlist">
                        <li>
                            <label for="phone">Phone</label>
                            <input id="phone"  name="phone"type="text" class="k-textbox" value="07856253671" style="width: 100%;" />
                        </li>
                        <li>
                            <p style="padding-top: 1em; text-align: right">
                                <button type="submit" class="k-button k-primary">Submit</button>
                            </p>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/account.index.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/account.index.js')}}"></script>
@endsection
