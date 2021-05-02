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

    //Fetch records
    public function getCities($countryId = 0)
    {
        //Fetch Cities by CountryID
        $cityData['data'] = City::orderby("name","asc")
            ->select('id','name')
            ->where('country_id', $countryId)
            ->get();
        return response()->json($cityData);
    }

    public function store(Request $request)
    {
        $request->validate([
            /*'first_name',
            'last_name',
            'dob',
            'gender',
            'mobile_number',
            'land_number',
            'email',
            'postal_code',
            'address_1',
            'address_2',
            'city',
            'state',
            'ni_number',
            'position',
            'id',
            'basic_salary',
            'hourly_rate' ,
            'branch' ,
            'username',
            'password',*/
            'name' => 'required|string|max:32',
            'email' => 'required|string|email|max:32',
            'password' => 'required|string|min:8',
            'first_name' => 'required|string|max:32',
            'last_name' => 'required|string|max:32',
            'dob' => 'required',
            'gender' => 'required',
            'mobile_number' => 'required|min:5',
            'land_number' => 'required',
            'email' => 'required|string|email|max:32',
            'postal_code' => 'required|string|max:32|',
            'address_1' => 'required|string|max:32|',
            'address_2' => 'required|string|max:32|',
            'city' => 'required|string|max:32|',
            'state' => 'required|string|max:32|',
            'ni_number' => 'required|string|max:32|',
            'position' => 'required|integer|max:32|',
            'id' => 'required|string|max:32|',
            'basic_salary' => 'required',
            'hourly_rate' => 'required',
            'branch' => 'string|max:32|',
            'user_name' => 'required|string|max:32|',
            'password' => 'required|string|max:256|',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User:: create($request->all());
        if($user)
        {
            echo"worked";
        }
        else{
            echo "not worked";
        }
        //return redirect(RouteServiceProvider::HOME);


        // Auth::login($user = User::create($request->all()));
        //$user->attachRole($request->role_id);
        //event(new Registered($user));
    }
}
