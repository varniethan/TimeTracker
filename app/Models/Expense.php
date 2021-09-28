<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expense extends Model
{
    use HasFactory;
    protected $table = "shift_expenses";
    protected $fillable = [
        'shift_id',
        'expense_type_id',
        'time',
        'amount',
        'proof',
        'status',
        'description',
    ];

    public static function getExpenseTypesOfOrganisations($org_id)
    {
        $expenseTypeData = DB::table('expense_types')
            ->where('organisation_id', '=', $org_id)
            ->get();
        return $expenseTypeData;
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
