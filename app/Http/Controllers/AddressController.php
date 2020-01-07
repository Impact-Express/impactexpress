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
            'contact_title.*' => 'max:35',
            'company_first_name.*' => 'max:35',
            'company_last_name.*' => 'max:35',
            'company_name.*' => 'max:35',
            'home_phone.*' => 'max:35',
            'work_phone.*' => 'max:35',
            'mobile_phone.*' => 'max:35',
            'email_address.*' => 'max:35',
            'fax_number.*' => 'max:35',
            'house_name.*' => 'max:35',
            'house_no.*' => 'max:35',
            'street_name.*' => 'max:35',
            'line_1.*' => 'required|string|max:35',
            'line_2.*' => 'max:35',
            'line_3.*' => 'max:35',
            'town.*' => 'required|string|max:35',
            'country_id.*' => 'required|string|max:35',
            'postcode.*' => 'required|string|max:10',
            'address_type_id.*' => 'required|max:1'
        ], [
            'contact_title.*' => 'Contact title may not be greater than 35 characters.',
            'contact_first_name.*' => 'Contact first name may not be greater than 35 characters.',
            'contact_last_name.*' => 'Contact last name may not be greater than 35 characters.',
            'company_name.*' => 'Company name may not be greater than 35 characters.',
            'home_phone.*' => 'Home phone may not be greater than 35 characters.',
            'work_phone.*' => 'Work phone may not be greater than 35 characters.',
            'mobile_phone.*' => 'Mobile phone may not be greater than 35 characters.',
            'house_name.*' => 'House name may not be greater than 35 characters.',
            'house_no.*' => 'House no may not be greater than 35 characters.',
            'street_name.*' => 'Street name may not be greater than 35 characters.',
            'line_1.*' => 'Line 1 may not be greater than 35 characters.',
            'line_2.*' => 'Line 2 may not be greater than 35 characters.',
            'line_3.*' => 'Line 3 may not be greater than 35 characters.',
            'town.*' => 'Town may not be greater than 35 characters.',
            'country_id.*' => 'Country may not be greater than 35 characters.',
            'postcode.*' => 'Postcode may not be greater than 10 characters.',
            'contact_phone.*' => 'Telephone may not be greater than 35 characters.'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $address = new Address();
        $address->user_id = Auth::id();
        $address->contact_title = Arr::first($request->input('contact_title'));
        $address->contact_first_name = Arr::first($request->input('contact_first_name'));
        $address->contact_last_name = Arr::first($request->input('contact_last_name'));
        $address->company_name = Arr::first($request->input('company_name'));
        $address->home_phone = Arr::first($request->input('home_phone'));
        $address->work_phone = Arr::first($request->input('work_phone'));
        $address->mobile_phone = Arr::first($request->input('mobile_phone'));
        $address->email_address = Arr::first($request->input('email_address'));
        $address->fax_number = Arr::first($request->input('fax_number'));
        
        $address->house_name = Arr::first($request->input('house_name'));
        $address->house_no = Arr::first($request->input('house_no'));
        $address->street_name = Arr::first($request->input('street_name'));
        $address->line_1 = Arr::first($request->input('line_1'));
        $address->line_2 = Arr::first($request->input('line_2'));
        $address->line_3 = Arr::first($request->input('line_3'));
        $address->town = Arr::first($request->input('town'));
        $address->postcode = Arr::first($request->input('postcode'));
        $address->country_id = Arr::first($request->input('country_id'));
        
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
            'contact_title.*' => 'max:35',
            'company_first_name.*' => 'max:35',
            'company_last_name.*' => 'max:35',
            'company_name.*' => 'max:35',
            'home_phone.*' => 'max:35',
            'work_phone.*' => 'max:35',
            'mobile_phone.*' => 'max:35',
            'email_address.*' => 'max:35',
            'fax_number.*' => 'max:35',
            'house_name.*' => 'max:35',
            'house_no.*' => 'max:35',
            'street_name.*' => 'max:35',
            'line_1.*' => 'required|string|max:35',
            'line_2.*' => 'max:35',
            'line_3.*' => 'max:35',
            'town.*' => 'required|string|max:35',
            'country_id.*' => 'required|string|max:35',
            'postcode.*' => 'required|string|max:10',
            'address_type_id.*' => 'required|max:1'
        ], [
            'contact_title.*' => 'Contact title may not be greater than 35 characters.',
            'contact_first_name.*' => 'Contact first name may not be greater than 35 characters.',
            'contact_last_name.*' => 'Contact last name may not be greater than 35 characters.',
            'company_name.*' => 'Company name may not be greater than 35 characters.',
            'home_phone.*' => 'Home phone may not be greater than 35 characters.',
            'work_phone.*' => 'Work phone may not be greater than 35 characters.',
            'mobile_phone.*' => 'Mobile phone may not be greater than 35 characters.',
            'house_name.*' => 'House name may not be greater than 35 characters.',
            'house_no.*' => 'House no may not be greater than 35 characters.',
            'street_name.*' => 'Street name may not be greater than 35 characters.',
            'line_1.*' => 'Line 1 may not be greater than 35 characters.',
            'line_2.*' => 'Line 2 may not be greater than 35 characters.',
            'line_3.*' => 'Line 3 may not be greater than 35 characters.',
            'town.*' => 'Town may not be greater than 35 characters.',
            'country_id.*' => 'Country may not be greater than 35 characters.',
            'postcode.*' => 'Postcode may not be greater than 10 characters.',
            'contact_phone.*' => 'Telephone may not be greater than 35 characters.'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $address->contact_title = Arr::first($request->input('contact_title'));
        $address->contact_first_name = Arr::first($request->input('contact_first_name'));
        $address->contact_last_name = Arr::first($request->input('contact_last_name'));
        $address->company_name = Arr::first($request->input('company_name'));
        $address->home_phone = Arr::first($request->input('home_phone'));
        $address->work_phone = Arr::first($request->input('work_phone'));
        $address->mobile_phone = Arr::first($request->input('mobile_phone'));
        $address->email_address = Arr::first($request->input('email_address'));
        $address->fax_number = Arr::first($request->input('fax_number'));
        
        $address->house_name = Arr::first($request->input('house_name'));
        $address->house_no = Arr::first($request->input('house_no'));
        $address->street_name = Arr::first($request->input('street_name'));
        $address->line_1 = Arr::first($request->input('line_1'));
        $address->line_2 = Arr::first($request->input('line_2'));
        $address->line_3 = Arr::first($request->input('line_3'));
        $address->town = Arr::first($request->input('town'));
        $address->postcode = Arr::first($request->input('postcode'));
        $address->country_id = Arr::first($request->input('country_id'));
        
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
