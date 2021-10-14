<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Organisation;
use App\Models\Position;
use App\Models\User;
use App\Models\ShiftType;
use App\Models\Shift;
use App\Models\OrganisationShifts;
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
        if (session('role_id') == 1 or session('role_id') == 2)
        {
            $fullShiftData = DB::select( DB::raw("SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              LEFT JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    where s.status =1 and u.status =1 and b.status=1
                                                    order by s.date desc"));
        }
        else
        {
            $user_id = session('user_id');
            $fullShiftData = DB::select( DB::raw("SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              LEFT JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    where s.status =1 and u.status =1 and b.status=1 and u.id=".$user_id.
                                                    " order by s.date desc"));
        }
        $organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($organisationdata['id']);
        $employeeData = User::getAllEmployeesByOrgId($organisationdata['id']);
        $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
        $positionData = Position::getPositionOrganisations($organisationdata['id']);
        return view('shifts.full_shifts_index',compact('branchData', 'positionData','employeeData', 'shiftTypeData','organisationdata','fullShiftData'));
    }

    public function filter_shift(Request $request)
    {
        $date = "";
        $branch_id = "";
        $user_id = "";
        $role_id = "";
        $position_id = "";
        $shift_type_id= "";

        if (($request->from_date != null) or ($request->to_date != null))
        {
            $date = ' AND s.date BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
        }

        if ($request->has('branch_id') and $request->branch_id != '0')
        {
            $branch_id = ' AND b.id ='.$request->branch_id;
        }

        if ($request->has('user_id') and $request->user_id != '0')
        {
            $user_id = ' AND u.id ='.$request->user_id;
        }

        if ($request->has('role_id') and $request->role_id != '0')
        {
            $role_id = ' AND r.id ='.$request->role_id;
        }

        if ($request->has('position_id') and $request->position_id != '0')
        {
            $position_id = ' AND p.id ='.$request->position_id;
        }

        if ($request->has('shift_type_id') and $request->shift_type_id != '0')
        {
            $shift_type_id = ' AND st.id ='.$request->shift_type_id;
        }
        $sql = "SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    WHERE s.status =1 and u.status =1 and b.status=1".$user_id.$date.$branch_id.$role_id.$position_id.$shift_type_id.
                                                    " order by s.date desc";
//        echo $sql;
//        exit();


        if (session('role_id') == 1 or session('role_id') == 2)
        {
            $fullShiftData = DB::select( DB::raw("SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    WHERE s.status =1 and u.status =1 and b.status=1".$date.$branch_id.$user_id.$role_id.$position_id.$shift_type_id.
                " order by s.date desc"));
        }
        else
        {
            $user_id = session('user_id');
            $fullShiftData = DB::select( DB::raw("SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    WHERE s.status =1 and u.status =1 and b.status=1 and u.id=".$user_id.$date.$branch_id.$shift_type_id.
                " order by s.date desc"));
        }
//        echo '<pre>';
//        var_dump($fullShiftData);
//        echo '</pre>';
//        exit();
        $organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($organisationdata['id']);
        $employeeData = User::getAllEmployeesByOrgId($organisationdata['id']);
        $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
        $positionData = Position::getPositionOrganisations($organisationdata['id']);
        return view('shifts.full_shifts_index',compact('branchData', 'positionData','employeeData', 'shiftTypeData','organisationdata','fullShiftData'));
    }

    /**
     * Show the form for creating an automatic shifts.
     *
     * @return \Illuminate\Http\Response
     */
    public function automaticShiftsIndex()
    {
        $branchData = Branch::getBrachesOfOrganisations(session('org_id'));
        $shiftData = OrganisationShifts::getOrganisationShifts(session('org_id'));
        return view('shifts.automatic_shifts', compact('shiftData', 'branchData'));
    }

    /**
     * Show the form for creating an automatic shifts.
     *
     * @return \Illuminate\Http\Response
     */
    public function pushGeneratedShifts(Request $request)
    {
        $ids = $request->ids;
        $shift_clock_in = DB::table('organisation_shifts')
            ->where('id', '=', $request->shift_id)
            ->pluck('start_time');
        $shift_clock_out = DB::table('organisation_shifts')
            ->where('id', '=', $request->shift_id)
            ->pluck('end_time');
        Session::flash('message', 'All '.count($ids).' are pushed to the database and approved :)');
        Session::flash('alert-class', 'alert-success');
        foreach ($ids as $employee)
        {
            Shift::pushGeneratedShift($employee, $request->branch_id, $request->shift_id, $request->date, $shift_clock_in[0], $shift_clock_out[0]);
        }
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
        if (substr($request->scheduled_from, -2) == 'PM')
        {
            $hour = substr($request->scheduled_from, 0, 2);
            $hour_24 = $hour + 12;
            $request->merge(['scheduled_from' => str_replace($hour, $hour_24, $request->scheduled_from)]);
        }

        if (substr($request->scheduled_to, -2) == 'PM')
        {
            $hour = substr($request->scheduled_to, 0, 2);
            $hour_24 = $hour + 12;
            $request->merge(['scheduled_to' => str_replace($hour, $hour_24, $request->scheduled_to)]);
        }
//        $clock_in = substr($request->clock_in, 0, -2);
//        $clock_out = substr($request->clock_out, 0, -2);
        $request->merge(['scheduled_from' => substr($request->scheduled_to, 0, -2)]);
        $request->merge(['scheduled_to' => substr($request->scheduled_to, 0, -2)]);
        //Full = 0 & Open = 1
        Shift::create($request->all() + ['organisation_id'=>session('org_id')] +['full_or_open'=> 0] + ['created_by'=>session('user_id')] + ['status'=>1]);
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
