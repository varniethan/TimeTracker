<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        //Fetch Countries
        $countryData['data'] = Country::getAllCountryNames();
        //Load index view
        return view('auth.register')->with("countryData", $countryData);
    }

    public function Register(Request $request)
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
            'post_code' => 'required|max:64',
            'address_1' => 'required|max:64',
            'address_2' => 'required|max:64',
            'city' => 'required',
            'ni_number' => 'required|max:32|',
            'basic_salary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'name' => 'required|string|max:32|',
            'password' => 'required_with:password_confirmation|same:password_confirmation|max:256|',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        User:: create($request->all() +['position_id'=>'1'] +['role_id'=>'2'] + ['created_by'=>'0']);
        $WelcomeEmail = new MailController;
        $WelcomeEmail->sendWelcomeEmail($request->first_name, $request->last_name,$request->email);
        return redirect(RouteServiceProvider::HOME);
    }
}
