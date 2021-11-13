<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Holiday extends Model
{
    use HasFactory;
    protected $table = "user_holidays";
    protected $fillable = [
        'holiday_type_id',
        'user_id',
        'date',
        'no_of_hours',
        'no_of_mins',
        'notes',
        'status',
    ];

    public static function getHolidayTypesOfOrganisations($org_id)
    {
        $holidayTypeData = DB::table('holiday_types')
            ->where('organisation_id', '=', $org_id)
            ->get();
        return $holidayTypeData;
    }

    public static function getHolidayOfOrganisations($org_id)
    {
        $holidayData = DB::table('user_holidays')
            ->where('organisation_id', '=', $org_id)
            ->where('status', '=', 1)
            ->get();
        return $holidayData;
    }

    public static function getEmployeeHoliday($user_id)
    {
        $holidayData = DB::table('user_holidays')
            ->where('user_id', '=', $user_id)
            ->where('status', '=', 1)
            ->get();
        return $holidayData;
    }


    public static function getHolidayTypeName($holiday_id)
    {
        $holidayTypeName = DB::table('holiday_types')
            ->where('id', '=', $holiday_id)
            ->pluck('name');
        return $holidayTypeName[0];
    }

    public static function getHolidayPayRate($holiday_id)
    {
        $holidayPayRate = DB::table('holiday_types')
            ->where('id', '=', $holiday_id)
            ->pluck('pay_rate');
        return $holidayPayRate[0];
    }
}
