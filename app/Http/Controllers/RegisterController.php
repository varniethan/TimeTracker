<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        //Fetch Countries
        $countryData['data'] = Country::orderby("name", "asc")
            ->select('id','name')
            ->get();
        //Load index view
        return view('auth.register')->with("countryData", $countryData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'dob' => 'required',
            'gender' => 'required',
            'password' => 'required|min:8',
            'mobile_number' => 'required|min:10',
            'land_number' => 'required',
            'email' => 'required|email|max:64',
            'postal_code' => 'required|max:64',
            'address_1' => 'required|max:64',
            'address_2' => 'required|max:64',
            'city' => 'required',
            'ni_number' => 'required|max:32|',
            'basic_salary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'role',
            'user_name' => 'required|string|max:32|',
            'password' => 'required_with:password_confirmation|same:password_confirmation|max:256|',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User:: create($request->all());
        return redirect(RouteServiceProvider::HOME);


        Auth::login($user = User::create($request->all()));
        //$user->attachRole($request->role_id);
        event(new Registered($user));
    }
}
