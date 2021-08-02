<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
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
        'post_code',
        'address_1',
        'address_2',
        'city',
        'state',
        'ni_number',
        'position_id',
        'organisation',
        'role_id',
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

    public static function getUserByEmail($email)
    {
        $user = User::where('email','=',$email)->first();
        return $user;
    }

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

    public static function getAllEmployeesByOrgId($org_id)
    {
        $employees = DB::table('users')
            ->whereIn('role_id', [4,5,6])
            ->where('organisation_id', '=', $org_id)
            ->paginate(9);
        return $employees;
    }

    public static function getBranchEmployees($branch_id)
    {
        $branchEmployees = DB::table('branch_users')
            ->where('branch_id', '=', $branch_id)
            ->join('users','users.id','=','branch_users.user_id')
            ->select('users.*')
            ->get();
        return $branchEmployees;
    }

    public static function getManagers()
    {
        //TODO:: Have to get managers from a particular branch
        $manager = User::with('role_id','=',4 or 6);
        return $manager;
    }
}
