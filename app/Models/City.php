<?php

namespace App\Models;

use App\Http\Controllers\CountryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $fillable = [
        'name',
        'state_id',
        'state_code',
        'country_id',
        'country_code',
        'latitude',
        'logitude',
    ];

    public static function getCityName($city_id)
    {
        $city = City::where('id','=',$city_id)->first();
        return $city['name'];
    }

    public static function getStateName($city_id)
    {
        $city = City::where('id','=',$city_id)->first();
        $state = DB::table('states')
                    ->select('name')
                    ->where('id','=',$city['state_id'])
                    ->first();
        return $state->name;
    }

    public static function getCitiesOfOrganisation($organisation_id)
    {
        //Get the city id of the organisation
        $organisation_city = Organisation::select('city')
            ->where('id','=',$organisation_id)
            ->first();
        //Find the country of the city
        $organisation_country = City::select('country_id')
            ->where('id','=',$organisation_city->city)
            ->first();
        //Fetch Cities by CountryID
        $cityData = City::orderby("name","asc")
            ->select('id','name')
            ->where('country_id', $organisation_country->country_id)
            ->get();
//        foreach ($cityData as $city)
//        {
//            echo $city->name;
//        }
//        exit();
        return $cityData;
        //Old Bad Inefficent Code
        //$countryId = (new CountryController)->getCountryId($data['city']);
        //$country_array = $countryId[0];
        //$country_int = $country_array->country_id;
        //$cities = (new CountryController)->getCitiesNotJson($country_int);
    }
}


