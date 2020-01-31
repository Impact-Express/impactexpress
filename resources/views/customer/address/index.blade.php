@extends('layouts.master')

@section('page-title', 'My Saved Addresses')

@section('content')
<style>.nav-address{background:#e3e3e3;}</style>
    <h3>Saved Addresses</h3>
{{--    (This page uses hidden forms which expand on click. The plan is to refactor to using modals, in line with the rest of the site)--}}
    <h4>Collection Addresses</h4>
    <ul class="collection-addresses">
        @forelse ($user->addresses as $i => $address)
            <?php $n = $i + 2; ?>
            @if ($address->address_type_id == 1)
                <li class="address">

                    <div class="address-item address-summary">
                        {{$address->contact_name}},
                        {{ $address->line_1 }},
                        {{ $address->country_id }},
                        {{ $address->postcode }}
                    </div>

                    <div class="address-item address-actions">
                        <form method="post" action="{{route('delete-address', ['address' => $address->uuid])}}">
                            @method('DELETE')
                            @csrf
                        </form>
                        <button class="k-button k-primary" id="edit-btn-{{$n}}" data-n="{{$n}}"><i class="fas fa-edit"></i></button>
                        <button class="k-button delete" id="delete-btn-{{$n}}" ><i class="fas fa-trash-alt"></i></button>
                    </div>

                    <div class="address-edit-form" id="address-edit-form-{{$n}}">
                        <div class="card-body" id="collection-address-edit-form">
                            @include('customer.address.forms.editAddressForm')
                        </div>
                    </div>

                </li>
            @endif
        @empty
            <li class="address">
                You have no saved collection addresses.
            </li>
        @endforelse
        <li class="address">
            <div id="new-collection-address-form">
                @include('customer.address.forms.newCollectionAddressForm')
            </div>
            <button class="k-button k-primary new-btn"><i class="fas fa-plus"></i></button>
        </li>
    </ul>

    <h4>Delivery Addresses</h4>
    <ul class="delivery-addresses">
        @forelse ($user->addresses as $i => $address)
            @if ($address->address_type_id == 2)
                <?php $n = $i + 2; ?>
                <li class="address">

                    <div class="address-item address-summary">
                        {{$address->contact_name}},
                        {{ $address->line_1 }},
                        {{ $address->country_id }},
                        {{ $address->postcode }}
                    </div>

                    <div class="address-item address-actions">
                        <form method="post" action="{{route('delete-address', ['address' => $address->uuid])}}">
                            @method('DELETE')
                            @csrf
                        </form>
                        <button class="k-button k-primary" id="edit-btn-{{$n}}" data-n="{{$n}}"><i class="fas fa-edit"></i></button>
                        <button class="k-button delete" id="delete-btn-{{$n}}" ><i class="fas fa-trash-alt"></i></button>
                    </div>

                    <div class="address-edit-form" id="address-edit-form-{{$n}}">
                        <div class="card-body" id="collection-address-edit-form">
                            @include('customer.address.forms.editAddressForm')
                        </div>
                    </div>

                </li>
            @endif
        @empty
            <li class="address">
                You have no saved delivery addresses.
            </li>
        @endforelse
        <li class="address">
            <div id="new-delivery-address-form">
                @include('customer.address.forms.newDeliveryAddressForm')
            </div>
            <button class="k-button k-primary new-btn"><i class="fas fa-plus"></i></button>
        </li>
    </ul>
    <style>

    </style>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/address.index.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/address.index.js')}}"></script>
@endsection