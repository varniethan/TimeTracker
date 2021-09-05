<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Organisation;
use App\Models\Position;
use App\Models\User;
use App\Models\ShiftType;
use App\Models\Shift;
use Illuminate\Support\Facades\DB;
use Session;
class FullShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from_date = "";
        $to_date = "";
        $branch = "";
        $user_id = "";
        $role = "";
        $position = "";

        if ($request->has('branch') and $request->branch != '0')
        {
            $branch = ' AND b.id =' + $request->$branch;
        }

        if ($request->has('branch') and $request->branch != '0')
        {
            $branch = ' AND between b.id =' + $request->f;
        }

        //select...............where status = 1" + $from

        $Organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($Organisationdata['id']);
        $employeeData = User::getAllEmployeesByOrgId($Organisationdata['id']);
        $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
        //Sending Positions that the organisation has to the view
        $positionData = Position::getPositionOrganisations($Organisationdata['id']);
        $fullShiftData = Shift::getFullShiftOfOrganisations(session('org_id'), $from_date, $to_date, $branch, $user_id, $role, $position);
        return view('shifts.full_shifts_index',compact('branchData', 'positionData','employeeData', 'shiftTypeData', 'fullShiftData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (substr($request->clock_in, -2) == 'PM')
        {
            $hour = substr($request->clock_in, 0, 2);
            $hour_24 = $hour + 12;
            $request->merge(['clock_in' => str_replace($hour, $hour_24, $request->clock_in)]);
        }

        if (substr($request->clock_out, -2) == 'PM')
        {
            $hour = substr($request->clock_out, 0, 2);
            $hour_24 = $hour + 12;
            $request->merge(['clock_out' => str_replace($hour, $hour_24, $request->clock_out)]);
        }
//        $clock_in = substr($request->clock_in, 0, -2);
//        $clock_out = substr($request->clock_out, 0, -2);
        $request->merge(['clock_in' => substr($request->clock_in, 0, -2)]);
        $request->merge(['clock_out' => substr($request->clock_out, 0, -2)]);
        //Full = 0 & Open = 1
        Shift::create($request->all() + ['organisation_id'=>session('org_id')] +['full_or_open'=> 0] + ['created_by'=>session('user_id')]);
        return redirect('/full_shifts');
    }

    /**
     * Approve a shift.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $fullShiftData = Shift::findOrFail($id);
        if ($fullShiftData->approved == "1")
        {
            Session::flash('message', 'The Shift has been already approved by '.User::getUser($fullShiftData->updated_by)['first_name'].' '.User::getUser($fullShiftData->updated_by)['last_name'].' (-_-)');
            Session::flash('alert-class', 'alert-info');
            return redirect('/full_shifts');
        }
        else if ($fullShiftData->approved == "0")
        {
            $fullShiftData->approved = '1';
            $fullShiftData->updated_by = session('user_id');
            $fullShiftData->save();
            Session::flash('message', 'The Shift has been approved :)');
            Session::flash('alert-class', 'alert-success');
            return redirect('/full_shifts');
        }
    }

    /**
     * Unapprove a shift.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unapprove($id)
    {
        $fullShiftData = Shift::findOrFail($id);
        if ($fullShiftData->approved == "0")
        {
            Session::flash('message', 'The Shift has been already unapproved by '.User::getUser($fullShiftData->updated_by)['first_name'].' '.User::getUser($fullShiftData->updated_by)['last_name'].' (-_-)');
            Session::flash('alert-class', 'alert-dark');
            return redirect('/full_shifts');
        }
        else if ($fullShiftData->approved == "1")
        {
            $fullShiftData->approved = '0';
            $fullShiftData->updated_by = session('user_id');
            $fullShiftData->save();
            Session::flash('message', 'The Shift has been unapproved (:');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/full_shifts');
        }
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
        $fullShiftData = Shift::findOrFail($id);
        if ($fullShiftData->approved == "0")
        {
            $fullShiftData->status = '0';
            $fullShiftData->updated_by = session('user_id');
            $fullShiftData->save();
            Session::flash('message', 'The Shift on '.$fullShiftData->date.' by '.User::getUser($fullShiftData->user_id)['first_name'].' '.User::getUser($fullShiftData->user_id)['last_name'].' at '.$fullShiftData->clock_in.' has been successfully deleted (-_-).');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/full_shifts');
        }
        else if ($fullShiftData->approved == "1")
        {
            Session::flash('message', 'Cannot be deleted at this time. Please unapprove the shift to delete it.');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/full_shifts');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCheckedShifts(Request $request)
    {
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['status'=>'0'], ['updated_by' => session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been deleted (-_-)');
        Session::flash('alert-class', 'alert-warning');
        return response()->json(['success'=>"all deleted!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveCheckedShifts(Request $request)
    {
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['approved'=>'1'], ['updated_by' => session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been approved :)');
        Session::flash('alert-class', 'alert-success');
        return response()->json(['success'=>"all approved!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unapproveCheckedShifts(Request $request)
    {
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['approved'=>'0'], ['updated_by' => session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been un approved (:');
        Session::flash('alert-class', 'alert-danger');
        return response()->json(['success'=>"all un approved!"]);
    }
}
