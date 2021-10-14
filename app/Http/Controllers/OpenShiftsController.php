<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Shift;
use App\Models\Organisation;
use App\Models\Position;
use App\Models\ShiftType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class OpenShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('role_id') == 1 or session('role_id') == 2)
        {
            $openShiftData = DB::select( DB::raw("SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              LEFT JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    where s.status =1 and u.status =1 and b.status=1 and s.clock_out IS NULL
                                                    order by s.date desc"));
        }
        else
        {
            $user_id = session('user_id');
            $openShiftData = DB::select( DB::raw("SELECT s.id AS id, s.date, st.name AS shift_type_name, u.name AS user_name, sb.id as shift_break, b.name AS branch_name, s.clock_in, s.clock_out, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60)),'m') AS duration, TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2) AS total_pay
                                                    FROM  shifts s
                                                              LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                              LEFT JOIN shift_types st on st.id = s.shift_type_id
                                                              JOIN users u on u.id = s.user_id
                                                              JOIN branches b on b.id = s.branch_shift_id
                                                              JOIN roles r on r.id = u.role_id
                                                              JOIN positions p on p.id = u.position_id
                                                    where s.status =1 and u.status =1 and b.status=1 and s.clock_out IS NULL and u.id=".$user_id.
                " order by s.date desc"));
        }
        $organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($organisationdata['id']);
        $employeeData = User::getAllEmployeesByOrgId($organisationdata['id']);
        $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
        $positionData = Position::getPositionOrganisations($organisationdata['id']);
        return view('shifts.open_shifts_index',compact('branchData', 'positionData','employeeData', 'shiftTypeData','organisationdata','openShiftData'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $current_time = Carbon::now();
//        echo $current_time->format('H:i:s');
//        echo $current_time->format('Y:m:d');
//        $request->merge(['clock_in' => $current_time->format('H:i:s')]);
//        $request->merge(['date' => $current_time->toDateString()]);
        Shift::create($request->all() + ['organisation_id'=>session('org_id')] + ['full_or_open'=> 1] + ['date'=> $current_time->toDateString()] +['clock_in'=> $current_time->format('H:i:s')] +['approved'=> 0] + ['created_by'=>session('user_id')]);
        return redirect('/open_shifts');
    }

    /**
     * Approve a shift.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $openShiftData = Shift::findOrFail($id);
        if ($openShiftData->approved == "1")
        {
            Session::flash('message', 'The Shift has been already approved by '.User::getUser($openShiftData->updated_by)['first_name'].' '.User::getUser($openShiftData->updated_by)['last_name'].' (-_-)');
            Session::flash('alert-class', 'alert-info');
            return redirect('/open_shifts');
        }
        else if ($openShiftData->approved == "0")
        {
            $openShiftData->approved = '1';
            $openShiftData->updated_by = session('user_id');
            $openShiftData->save();
            Session::flash('message', 'The Shift has been approved :)');
            Session::flash('alert-class', 'alert-success');
            return redirect('/open_shifts');
        }
    }

    /**
     * Unapprove a shift.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unapprove($id)
    {
        $openShiftData = Shift::findOrFail($id);
        if ($openShiftData->approved == "0")
        {
            Session::flash('message', 'The Shift has been already unapproved by '.User::getUser($openShiftData->updated_by)['first_name'].' '.User::getUser($openShiftData->updated_by)['last_name'].' (-_-)');
            Session::flash('alert-class', 'alert-dark');
            return redirect('/open_shifts');
        }
        else if ($openShiftData->approved == "1")
        {
            $openShiftData->approved = '0';
            $openShiftData->updated_by = session('user_id');
            $openShiftData->save();
            Session::flash('message', 'The Shift has been unapproved (:');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/open_shifts');
        }
    }

    /**
     * End a shift.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function end($id)
    {
        $current_time = Carbon::now();
        $openShiftData = Shift::findOrFail($id);
        $openShiftData->clock_out = $current_time->format('H:i:s');
        $openShiftData->updated_by = session('user_id');
        $openShiftData->save();
        Session::flash('message', 'The Shift has been succesfully ended (:');
        Session::flash('alert-class', 'alert-dark');
        return redirect('/open_shifts');

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $openShiftData = Shift::findOrFail($id);
        if ($openShiftData->approved == "0")
        {
            $openShiftData->status = '0';
            $openShiftData->updated_by = session('user_id');
            $openShiftData->save();
            Session::flash('message', 'The Shift on '.$openShiftData->date.' by '.User::getUser($openShiftData->user_id)['first_name'].' '.User::getUser($openShiftData->user_id)['last_name'].' at '.$openShiftData->clock_in.' has been successfully deleted (-_-).');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/open_shifts');
        }
        else if ($openShiftData->approved == "1")
        {
            Session::flash('message', 'Cannot be deleted at this time. Please unapprove the shift to delete it.');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/open_shifts');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyCheckedShifts(Request $request)
    {
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['status'=>'0'], ['updated_by'=>session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been deleted (-_-)');
        Session::flash('alert-class', 'alert-warning');
        return response()->json(['success'=>"all deleted!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  RedirectResponse
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveCheckedShifts(Request $request)
    {
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['approved'=>'1'], ['updated_by'=>session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been approved :)');
        Session::flash('alert-class', 'alert-success');
        return response()->json(['success'=>"all approved!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function unapproveCheckedShifts(Request $request)
    {
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['approved'=>'0'], ['updated_by'=>session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been un approved (:');
        Session::flash('alert-class', 'alert-danger');
        return response()->json(['success'=>"all un approved!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function endCheckedShifts(Request $request)
    {
        $current_time = Carbon::now();
        $ids = $request->ids;
        Shift::whereIn('id', $ids)->update(['clock_out'=>$current_time->format('H:i:s')], ['updated_by'=>session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected shifts has been ended');
        Session::flash('alert-class', 'alert-dark');
        return response()->json(['success'=>"all un approved!"]);
    }
}
