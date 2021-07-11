<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\City;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'mobile_number',
        'land_number',
        'email',
        'postal_code',
        'address_1',
        'address_2',
        'city',
        'state',
        'ni_number',
        'position_id',
        'role_id',
        'id',
        'basic_salary',
        'hourly_rate',
        'branch',
        'user_name',
        'password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUser($user)
    {
        $user = User::where('id','=',$user)->first();
        return $user;
    }

    public static function getCountry($city)
    {
        $city = City::where('id','=',$city);
        return $city;
    }
}
