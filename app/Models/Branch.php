<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Branch extends Model
{
    use HasFactory;
    protected $table = "branches";
    protected $fillable = [
        'name',
        'display_name',
        'organisation_id',
        'email',
        'mobile_number',
        'land_number',
        'address_1',
        'address_2',
        'postal_code',
        'latitude',
        'longitude',
        'city',
    ];

    public static function getBrachesOfOrganisations($org_id)
    {
        $branches = Branch::where('organisation_id','=',$org_id)->paginate(9);
        return $branches;
    }

    public static function getBranchOfUserByBranchId($branch_id)
    {
        $branch = Branch::where('id','=',$branch_id)->first();
        return $branch;
    }

    public static function getBranchesOfManagerByUserId($user_id)
    {
        $branches = DB::table('branch_managers')
            ->where('branch_manager_id', '=', $user_id)
            ->join('branches','branches.id','=','branch_managers.branch_id')
            ->select('branches.*')
            ->get();
        return $branches;
    }

    public static function getBranchesOfUserByUserId($user_id)
    {
        $branches = DB::table('branch_users')
            ->where('user_id', '=', $user_id)
            ->join('branches','branches.id','=','branch_users.branch_id')
            ->select('branches.*')
            ->get();
        return $branches;
    }

    public static function getBranchOfManager($user_id)
    {
        $branch = DB::table('branch_managers')
            ->where('branch_manager_id','=',$user_id)
            ->first();
        return $branch;
    }

    public function setBranchAttribute($value)
    {
        $this->attributes['name'] = json_encode($value);
    }


    public function getBranchAttribute($value)
    {
        return $this->attributes['name'] = json_decode($value);
    }
}
