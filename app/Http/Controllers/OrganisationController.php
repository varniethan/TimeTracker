<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use App\Models\Organisation;

use App\Models\Country;
use App\Models\User;
use App\Http\Controllers\MailController;
class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $manyOrganisationsPermission = array(1 ,2);
        $oneOrganisationPermission = array(3,4,5,6);
        if (in_array( Session('role_id'), $manyOrganisationsPermission))
        {
            $organisationData = Organisation::getEmployerAllOrganisations(Session('user_id'));
            return view('organisation.index', compact('organisationData'));
        }
        elseif (in_array( Session('role_id'), $oneOrganisationPermission))
        {
            $organisationData = Organisation::getEmployeeOrganisation(Session('user_id'));
            return view('organisation.index', compact('organisationData'));
        }
//        try
//        {
//
//        }
//        catch (ModelNotFoundException $exception)
//        {
//            return back() ->withErrors($exception->getMessage()->withInput());
//        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countryData = Country::getAllCountryNames();
        return view('organisation.create')->with('countryData',$countryData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:64',
            'display_name' => 'required',
            'email' => 'required|email|max:64',
            'mobile_number' => 'required|min:10',
            'land_number' => 'required',
            'postal_code' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
        ]);
        $userData = User::getUser(Session('user_id'));
        $request->session()->put('org_id', $userData['organisation_id']);
        $organisationData = Organisation:: create($request->all() + ['owner'=>$userData['id']] + ['created_by'=>$userData['id']]);
        $userData->organisation_id = $organisationData['id'];
        $userData->save();
        $request->session()->push('org_id',$userData->organisation_id);
        $OrganisationCreated = new MailController;
        $OrganisationCreated->sendOrganisationCreatedEmail($userData['first_name'], $userData['second_name'], $userData['email'], $request->organisation_name);
        return redirect('/organisation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // get the organisation
        $organisationData = Organisation::find($id);
        $branchData = Branch::getBrachesOfOrganisations($id);
        // show the view and pass the branch to it
        return view('organisation.show', compact('branchData', 'organisationData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $organisationData= Organisation::find($id);
        $countryData = Country::getAllCountryNames();
        return view('organisation.edit', compact('organisationData', 'countryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $organisationData = Organisation::findOrFail($id);
        $this->validate($request,[
            'mobile_number' => 'required|min:10',
            'land_number' => 'required',
            'postal_code' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
        ]);
        $input = $request->all();
        $organisationData->fill($input)->save();
        return redirect()->route('organisation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $organisationData = Organisation::findOrFail($id);
        $organisationData->delete();
        return redirect()->route('organisation.index');

    }
}
