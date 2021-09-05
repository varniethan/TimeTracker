<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Http\Controllers\View;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $org_id = Session('org_id');
        $seeAllBranches = array(1 ,2, 3);
        $seeBranch = array(4 , 5);
        if (in_array( Session('role_id'), $seeAllBranches))
        {
            $branchData = Branch::getBrachesOfOrganisations(session('org_id'));
            return view('branch.index', compact('branchData'));
        }
        elseif (in_array( Session('role_id'), $seeBranch))
        {
            $branchData = Branch::getBranchesOfManagerByUserId(session('user_id')); //Returns all the branches that the branch/ fullShifts manager is in
            return view('branch.index', compact('branchData'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countryData = Country::getAllCountryNames();
        return view('branch.create')->with('countryData',$countryData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        $organisationData = Organisation::getEmployerAllOrganisations(Session('user_id'));
        $branchData = Branch:: create($request->all() + ['organisation_id'=>$organisationData['id']]);
        return redirect('/branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the branch
        $branchData = Branch::find($id);
        $organisationData = Organisation::getBranchOrganisation($branchData['organisation_id']);
        // show the view and pass the branch to it
        return view('branch.show', compact('branchData', 'organisationData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branchData= Branch::find($id);
        $organisationData= Organisation::find($branchData['organisation_id']);
        $countryData = Country::getAllCountryNames();
        return view('branch.edit', compact('branchData','organisationData', 'countryData'));
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
        $branchData = Branch::findOrFail($id);
        $this->validate($request,[
            'mobile_number' => 'required|min:10',
            'land_number' => 'required',
            'postal_code' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
        ]);
        $input = $request->all();
        $branchData->fill($input)->save();
        return redirect()->route('branch.index');
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
