<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountNumber;
use App\Models\CostTariff;
use App\Models\SalesTariff;
use App\Models\Carrier;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesTariffs = SalesTariff::all();
        $costTariffs = CostTariff::all();
        $accountNumbers = AccountNumber::all();
        $carriers = Carrier::all();

        return view('admin.tariffs.index', compact('salesTariffs', 'costTariffs', 'accountNumbers', 'carriers'));
    }

    public function storeSales(Request $request)
    {
        // validate

        // persist
        SalesTariff::createTariff($request);

        // redirect
        return redirect(route('admin.tariffs.index'));
    }

    public function storeCost(Request $request)
    {
        // validate

        // persist
        CostTariff::createTariff($request);

        // redirect
        return redirect(route('admin.tariffs.index'));
    }

    public function showSales(SalesTariff $SalesTariff)
    {
// dd('sales', $SalesTariff);
        $valuesByWeight = [];
        foreach ($SalesTariff->values as $value) {
            $valuesByWeight[$value->weight]['zone'.$value->zone] = $value->amount;
        }
        $SalesTariff->valuesByWeight = $valuesByWeight;

        return view('admin.tariffs.showsales', compact('SalesTariff'));
    }

    public function showCost(CostTariff $CostTariff)
    {
// dd('cost',$CostTariff);
        $valuesByWeight = [];
        foreach ($CostTariff->values as $value) {
            $valuesByWeight[$value->weight]['zone'.$value->zone] = $value->amount;
        }
        $CostTariff->valuesByWeight = $valuesByWeight;

        return view('admin.tariffs.showcost', compact('CostTariff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
