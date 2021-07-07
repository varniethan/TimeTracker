<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\Country;
use App\Models\Organisation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

class EmployeeController extends Controller
{

    public function OrganisationData()
    {
        $user = session('user_id');
        $position = session('position');
        $organisation = Session('org_id');
        $data = Organisation::where('id','=',$organisation)->first();
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       /* return view('employee.index', compact('employees'));*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->organisationData();
        $countryId = (new CountryController)->getCountryId($data['city']);
        $country_array = $countryId[0];
        $country_int = $country_array->country_id;
        $cities = (new CountryController)->getCities($country_int);
        //Load index view
        return view('employee.create')->with("cityData", $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
