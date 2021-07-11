<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = "countries";

    public static function getAllCountryNames()
    {//Fetch Countries
        $countries = Country::orderby("name", "asc")
                ->select('id', 'name')
                ->get();
        return $countries;
    }
}
