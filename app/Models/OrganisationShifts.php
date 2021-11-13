<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrganisationShifts extends Model
{
    use HasFactory;
    protected $table = "organisation_shifts";
    protected $fillable = [
        'organisation_id',
        'shift_name',
        'start_time',
        'end_time',
        'number_of_employees_needed',
    ];

    public static function getOrganisationShifts($org_id)
    {
        $shifts = OrganisationShifts::where('organisation_id','=',$org_id)->get();
        return $shifts;
    }
    public static function getOrganisationShift($id)
    {
        $shift_name = OrganisationShifts::where('id','=',$id)->value('shift_name');
        return $shift_name;
    }
}
