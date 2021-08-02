<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions';
    //Position is company specific
    protected $fillable = [
        'name',
        'description',
        'organisation',
        'basic_salary',
        'overtime',
        'pay_type',
    ];

    public static function getPositionOrganisations($org_id)
    {
        $positionsData = Position::where('organisation','=',$org_id)->get();
        return $positionsData;
    }
}
