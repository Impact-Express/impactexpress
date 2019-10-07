<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrier;


class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriers = Carrier::all();
        return view('admin.carriers.index', compact('carriers'));
    }

    public function profile(Carrier $carrier)
    {
        // dd($carrier->salesTariffs);
        return view('admin.carriers.profile', compact('carrier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate

        // Persist
        $carrier = new Carrier();
        $carrier->name = $request->input('name');
        $carrier->status = 'inactive';
        $carrier->save();

        // Redirect
        return redirect(route('admin.carriers.index'));
    }

    public function toggleStatus(Request $request)
    {
        // validate

        // persist
        $carrier = Carrier::findOrFail($request->id);
        $newStatus = $carrier->status === 'active' ? 'inactive' : 'active';
        $carrier->status = $newStatus;
        $carrier->save();

        // redirect
        return redirect(route('admin.carriers.profile', [$carrier->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Validate
        // Delete
    }
}
