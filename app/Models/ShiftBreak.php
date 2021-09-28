<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class ShiftBreak extends Model
{
    use HasFactory;
    protected $table = "shift_breaks";
    protected $fillable = [
        'shift_id',
        'break_type_id',
        'start',
        'end',
        'status',
    ];

    public static function addShiftBreak($shift_id, $break_type_id, $start)
    {
        DB::table('shift_breaks')->insert([
            'shift_id' =>  $shift_id,
            'break_type_id' => $break_type_id,
            'start' => $start,
            'status' =>  '0',
            'created_by' =>  session('user_id'),
        ]);
    }

    public static function getBreakTypesOfOrganisations($org_id)
    {
        $breakTypeData = DB::table('break_types')
            ->where('organisation_id', '=', $org_id)
            ->get();
        return $breakTypeData;
    }

    public static function getExpenseOfOrganisations($org_id)
    {
        $expenseData = DB::table('shift_expenses')
            ->where('organisation_id', '=', $org_id)
            ->where('status', '=', 1)
            ->get();
        return $expenseData;
    }
}
