<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CountryController;
use App\Models\city;
use App\Models\Country;
use App\Models\Organisation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

class eeeeEmployeeController extends Controller
{
    public function OrganisationData()
    {
        $organisation = Session('org_id');
        $data = Organisation::where('id','=',$organisation)->first();
        return $data;
    }

    public function create()
    {
        $data = $this->organisationData();
        $countryId = (new CountryController)->getCountryId($data['city']);
        $country_array = $countryId[0];
        $country_int = $country_array->country_id;
        $cities = (new CountryController)->getCities($country_int);
        //Load index view
        return view('employee.create')->with("cityData", $cities);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make(
            $request->all(), [
                'first_name' => 'required|string|max:64',
                'last_name' => 'required|string|max:64',
                'dob' => 'required',
                'gender' => 'required',
                'mobile_number' => 'required|min:10',
                'land_number' => 'required',
                'email' => 'required|email|max:64',
                'postal_code' => 'required|max:64',
                'address_1' => 'required|max:64',
                'address_2' => 'max:64',
                'city' => 'required',
                'ni_number' => 'required|max:32|',
                'basic_salary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'role',
                'position',
                'user_name' => 'required|string|max:32|',
//              'document.*' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
            ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $user = User:: create($request->all());
        return redirect(RouteServiceProvider::HOME);
    }

}
