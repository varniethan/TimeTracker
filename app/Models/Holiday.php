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
}
