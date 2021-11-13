<?php

namespace App\Models;

use App\View\Components\form\select;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Organisation extends Model
{
    use HasFactory;
    protected $table = "organisations";
    protected $fillable = [
        'name',
        'display_name',
        'email',
        'owner',
        'mobile_number',
        'land_number',
        'address_1',
        'address_2',
        'postal_code',
        'latitude',
        'logitude',
        'city',
        'created_by',
    ];

    public static function getEmployerAllOrganisations($owner)
    {
        // TODO:Implement --> Can get multiple organisations if the employer has got many
        $organisationsData = Organisation::where('owner','=',$owner)->first();
        return $organisationsData;
    }

    public static function getOrganisationName($id)
    {
        $organisation = Organisation::where('id','=',$id)->pluck('name');
        return $organisation[0];
    }

    public static function getMDOrganisation($user)
    {
        $organisationData = Organisation::where('MD','=',$user)->first();
        return $organisationData;
    }

    public static function getEmployeeOrganisation($user)
    {
        $organisation_id = User::where('id','=',$user)->pluck('organisation_id');
        $organisationData = Organisation::where('id','=',$organisation_id[0])->first();

        return $organisationData;
    }

    public static function getBranchOrganisation($organisation_id)
    {
        $organisation_data = Organisation::where('id','=',$organisation_id)->first();
        return $organisation_data;
    }
}
