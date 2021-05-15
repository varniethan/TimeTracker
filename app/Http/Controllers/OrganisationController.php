<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Organisation;
use Illuminate\Support\Facades\Hash;

class OrganisationController extends Controller
{
    public function organisationData()
    {
        $organisation = Session('org_id');
        $data = Organisation::where('id','=',$organisation)->first();
        return $data;
    }

    public function create()
    {
        //Fetch Countries
        $countryData['data'] = Country::orderby("name", "asc")
            ->select('id','name')
            ->get();
        //Load index view
        return view('employer.add_company')->with("countryData", $countryData);
    }

    public function viewCompany()
    {
        $data = $this->organisationData();
        return view('employer.view_all_company',['organisation'=>$data]);
    }

    public function getAddCompany()
    {
        $data = $this->organisationData();
        return view('employer.add_company',['organisation'=>$data]);
    }

    public function add(Request $request)
    {
        $request->validate([
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
        ]);
        $organisation = Organisation:: create($request->all());
        if ($organisation)
        {
            $request->session()->put('org_id', $organisation->id);
        }
        $data = $this->organisationData();
        return view('employer.view_all_company',['organisation'=>$data]);
    }
}
