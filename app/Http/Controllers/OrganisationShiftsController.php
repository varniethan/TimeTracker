<?php

namespace App\Http\Controllers;

use App\Models\OrganisationShifts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganisationShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisationShiftsData = OrganisationShifts::getOrganisationShifts(session('org_id'));
        return view('job.organisation_shifts',compact('organisationShiftsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OrganisationShifts::create($request->all() + ['organisation_id'=>session('org_id')] + ['status'=>1]);
        return redirect('/organisation_shifts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeData = DB::select( DB::raw("SELECT es.employee_id as employee_name, os.shift_name as shift_name,u.*, p.name as position
                                FROM organisation_shifts os
                                LEFT JOIN employee_shifts es on es.organisation_shift_id = os.id
                                JOIN users u on u.id = es.employee_id
                                JOIN positions p on p.id = u.position_id
                                WHERE os.id =".$id));
        $shiftData = OrganisationShifts::getOrganisationShift($id);

//        echo '<pre>';
//        var_dump($shiftData);
//        echo '</pre>';
//        exit();
//        $organisationData = Organisation::getBranchOrganisation($shiftData['organisation_id']);
        // show the view and pass the branch to it
        return view('job.organisation_shifts_employees', compact('employeeData', 'shiftData'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganisationShifts  $organisationShifts
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganisationShifts $organisationShifts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganisationShifts  $organisationShifts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganisationShifts $organisationShifts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganisationShifts  $organisationShifts
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganisationShifts $organisationShifts)
    {
        //
    }
}
