<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;


class ShiftType extends Model
{
    use HasFactory;
    protected $table = 'shift_types';
    //Position is company specific
    protected $fillable = [
        'name',
        'description',
        'organisation_id',
        'exclude_from_over_time',
        'status',
        'pay_type',
        'created_by',
    ];

    public static function getShiftTypeOrganisations($org_id)
    {
        $shiftTypeData = shiftType::where('organisation_id','=',$org_id)->get();
        return $shiftTypeData;
    }

    public static function getShiftTypeName($id)
    {
        $shiftTypeName = shiftType::where('id','=',$id)->pluck('name');
        return $shiftTypeName[0];
    }

    public static function getBranchShiftTypeOrganisations($org_id)
    {
        $branchData = Branch::getBrachesOfOrganisations($org_id);
        $branchShiftTypeData = DB::table('branch_shifts')->whereIn('branch_id', $branchData);
        return $branchShiftTypeData;
    }
}
