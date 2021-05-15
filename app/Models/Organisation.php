<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $table = "organisations";
    protected $fillable = [
        'name',
        'display_name',
        'owner',
        'mobile_number',
        'land_number',
        'address_1',
        'address_2',
        'postal_code',
        'latitude',
        'logitude',
        'city',
    ];
}
