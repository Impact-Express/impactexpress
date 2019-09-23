<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class AddressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('customer.address.index', compact('user'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_name.*' => 'max:35',
            'company_name.*' => 'max:35',
            'line_1.*' => 'required|string|max:35',
            'line_2.*' => 'max:35',
            'line_3.*' => 'max:35',
            'town.*' => 'required|string|max:35',
            'country.*' => 'required|string|max:35',
            'postcode.*' => 'required|string|max:10',
            'contact_phone.*' => 'max:35',
            'address_type_id.*' => 'required|max:1'
        ], [
            'contact_name.*' => 'Contact may not be greater than 35 characters.',
            'company_name.*' => 'Company name may not be greater than 35 characters.',
            'line_1.*' => 'Line 1 may not be greater than 35 characters.',
            'line_2.*' => 'Line 2 may not be greater than 35 characters.',
            'line_3.*' => 'Line 3 may not be greater than 35 characters.',
            'town.*' => 'Town may not be greater than 35 characters.',
            'country.*' => 'Country may not be greater than 35 characters.',
            'postcode.*' => 'Postcode may not be greater than 10 characters.',
            'contact_phone.*' => 'Telephone may not be greater than 35 characters.'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $address = new Address();
        $address->user_id = Auth::id();
        $address->contact_name = Arr::first($request->input('contact_name'));
        $address->company_name = Arr::first($request->input('company_name'));
        $address->line_1 = Arr::first($request->input('line_1'));
        $address->line_2 = Arr::first($request->input('line_2'));
        $address->line_3 = Arr::first($request->input('line_3'));
        $address->town = Arr::first($request->input('town'));
        $address->country_id = Arr::first($request->input('country'));
        $address->postcode = Arr::first($request->input('postcode'));
        $address->contact_phone = Arr::first($request->input('contact_phone'));
        $address->address_type_id = Arr::first($request->input('address_type_id'));
        $address->save();

        return redirect('/address');
    }


    public function update(Request $request, Address $address)
    {
        if (Auth::id() != $address->user_id) {
            return redirect('/home');
        }

        $validator = Validator::make($request->all(), [
            'contact_name.*' => 'max:35',
            'company_name.*' => 'max:35',
            'line_1.*' => 'required|string|max:35',
            'line_2.*' => 'max:35',
            'line_3.*' => 'max:35',
            'town.*' => 'required|string|max:35',
            'country.*' => 'required|string|max:35',
            'postcode.*' => 'required|string|max:10',
            'contact_phone.*' => 'string|max:35'
        ], [
            'contact_name.*' => 'Contact may not be greater than 35 characters.',
            'company_name.*' => 'Company name may not be greater than 35 characters.',
            'line_1.*' => 'Line 1 may not be greater than 35 characters.',
            'line_2.*' => 'Line 2 may not be greater than 35 characters.',
            'line_3.*' => 'Line 3 may not be greater than 35 characters.',
            'town.*' => 'Town may not be greater than 35 characters.',
            'country.*' => 'Country may not be greater than 35 characters.',
            'postcode.*' => 'Postcode may not be greater than 10 characters.',
            'contact_phone.*' => 'Telephone may not be greater than 35 characters.'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $address->contact_name = Arr::first($request->input('contact_name'));
        $address->company_name = Arr::first($request->input('company_name'));
        $address->line_1 = Arr::first($request->input('line_1'));
        $address->line_2 = Arr::first($request->input('line_2'));
        $address->line_3 = Arr::first($request->input('line_3'));
        $address->town = Arr::first($request->input('town'));
        $address->country_id = Arr::first($request->input('country'));
        $address->postcode = Arr::first($request->input('postcode'));
        $address->contact_phone = Arr::first($request->input('contact_phone'));
        $address->save();

        return redirect('/address');
    }


    public function destroy(Address $address)
    {
        if ($address->user_id == Auth::id()) {
            $address->delete();
        }
        return redirect('/address');
    }
}
