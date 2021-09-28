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
        $date = "";
        $branch_id = "";
        $user_id = "";
        $role_id = "";
        $position_id = "";
        $shift_type_id= "";
//        $branch_id = " AND branches.id=";
//        $user_id = "  AND users.id= ";
//        $role_id = " AND roles.id=";
//        $position_id = " AND positions.id=";
//        $shift_type_id= " AND shifts_types.id=";

        if ($request->has('from_date') and $request->has('to_date'))
        {
            $date = ' AND between shifts.date ='.$request->from_date.' AND '.$request->to_date;
        }

        if ($request->has('branch_id') and $request->branch_id != '0')
        {
            $branch_id = ' AND branches.id ='.$request->branch_id;
        }

        if ($request->has('user_id') and $request->user_id != '0')
        {
            $user_id = ' AND users.id ='.$request->user_id;
        }

        if ($request->has('role_id') and $request->role_id != '0')
        {
            $role_id = ' AND between roles.id ='.$request->role_id;
        }

        if ($request->has('position_id') and $request->position_id != '0')
        {
            $position_id = ' AND between positions.id ='.$request->position_id;
        }

        if ($request->has('shift_type_id') and $request->shift_type_id != '0')
        {
            $shift_type_id = ' AND between shif_types.id ='.$request->shift_type_id;
        }

        $fullShiftData = DB::select( DB::raw("SELECT * FROM shifts WHERE shifts.status = 1 =:date =:branch_id =:user_id =:role_id =:position_id =:shift_type_id"), array(
//        $fullShiftData = DB::select( DB::raw(" select shifts.* from shifts, branches, users, roles, positions, shift_types, organisations
//                                where shifts.user_id = users.id and shifts.branch_shift_id=branches.id and shifts.shift_type_id=shift_types.id
//                                and shift_types.id = 3 and shifts.status=1 and shifts.organisation_id=11 and users.id = 175 and branches.id = 1 and shifts.full_or_open=1;"),
//            array(
            'date' => $date,
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role_id' => $role_id,
            'position_id' => $position_id,
            'shift_type_id' => $shift_type_id,
        ));
//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
//        exit();
        $Organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($Organisationdata['id']);
        $employeeData = User::getAllEmployeesByOrgId($Organisationdata['id']);
        $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
        $positionData = Position::getPositionOrganisations($Organisationdata['id']);
//        $fullShiftData = Shift::getFullShiftOfOrganisations(session('org_id'), $from_date, $to_date, $branch_id, $user_id, $role_id, $position_id);
        return view('shifts.full_shifts_index',compact('branchData', 'positionData','employeeData', 'shiftTypeData', 'fullShiftData'));
//        return view('shifts.full_shifts_index', compact('data'));
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
        // get the branch
        $shiftData = Shift::find($id);
        $breakTypeData = DB::table('break_types')
            ->where('organisation_id','=', session('org_id'))
            ->select('id','name')
            ->get();
//        echo $breakTypeData;
//        exit;
//        $organisationData = Organisation::getBranchOrganisation($shiftData['organisation_id']);
        // show the view and pass the branch to it
        return view('shifts.show', compact('shiftData', 'breakTypeData'));
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
