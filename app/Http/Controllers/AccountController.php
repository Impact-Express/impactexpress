<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Group;

class AccountController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return view('customer.account.index', compact('user'));
    }

    public function update(Request $request) {
        auth()->user()->update(
            $request->only(['name', 'email', 'address', 'phone'])
        );

        return redirect(route('account.index'));
    }

    public function customers() {

        $group_id = Group::where(['name' => 'customer'])->first()->id;
        $users = User::where(['group_id' => $group_id])->get(); // just this for now

        return view('admin.customers.index', compact('users'));
    }

    public function customerProfile(User $user) {

        $tariffs = $user->getSalesTariffs();
        return view('admin.customers.profile', compact('user', 'tariffs'));
    }
}
