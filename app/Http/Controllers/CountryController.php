<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class CountryController extends Controller
{
    public function index()
    {
        //Fetch Countries
        $countryData['data'] = Country::orderby("name", "asc")
                                ->select('id','name')
                                ->get();
        //Load index view
        return view('test')->with("countryData", $countryData);
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

}
