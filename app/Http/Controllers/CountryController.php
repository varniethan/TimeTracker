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
    public function getCities($countryId)
    {
        //Fetch Cities by CountryID
        $cityData['data'] = City::orderby("name","asc")
                                ->select('id','name')
                                ->where('country_id', $countryId)
                                ->get();
//        return response()->json($cityData);
        return $cityData['data'];
    }

    public function getCountryId($cityId)
    {
        //Fetch the contryId from the city
        $countryId = City::orderby("name","asc")
                        ->select('country_id')
                        ->where('cities.id',$cityId)
                        ->get();
        /*return response()->json($countryId);*/
        return $countryId;
    }

}
