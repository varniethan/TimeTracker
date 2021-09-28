<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shift extends Model
{
    use HasFactory;
    protected $table = "shifts";
    protected $fillable = [
        'user_id',
        'branch_shift_id',
        'shift_type_id',
        'organisation_id',
        'full_or_open',
        'date',
        'scheduled_from',
        'scheduled_to',
        'clock_in',
        'clock_out',
        'approved',
        'shift_note',
        'status',
        'created_by',
        'updated_by',
    ];

    public static function getFullShiftOfOrganisations($org_id)
    {
//        $fullShifts = Shift::where('organisation_id','=',$org_id)->paginate(9);
        $fullShifts = DB::table('shifts')
            ->where('organisation_id', '=', $org_id)
            ->whereNotNull('clock_out')
            ->where('status', '=', 1)
            ->get();
        return $fullShifts;
    }

    public static function getTodayUserShifts($userid, $date, $branch)
    {
        $fullShifts = DB:: table('shifts')
            ->where('date','=', $date)
            ->where('user_id','=', $userid)
            ->where('status','=','1')
            ->where('branch_shift_id','=',$branch)
            ->get();
        return $fullShifts;
    }


//    public static function getFullShiftOfOrganisations($org_id, $from_date, $to_date, $branch, $user_id, $role, $position)
//    {
////        $fullShifts = Shift::where('organisation_id','=',$org_id)->paginate(9);
//        $fullShifts = DB::table('shifts')
//            ->where('organisation_id', '=', $org_id)
//            ->whereBetween('date',[$from_date, $to_date])
//            ->where('branch_shift_id', '=', $branch)
//            ->where('user_id', '=', $user_id)
//            ->where('full_or_open', '=', 0)
//            ->get();
//        return $fullShifts;
//    }

    public static function getOpenShiftOfOrganisations($org_id)
    {
//        $openShifts = Shift::where('organisation_id','=',$org_id and '')->paginate(9);
        $openShifts = DB::table('shifts')
            ->where('organisation_id', '=', $org_id)
            ->where('full_or_open', '=', 1)
            ->whereNull('clock_out')
            ->where('status', '=', 1)
            ->get();
        return $openShifts;
    }
}
