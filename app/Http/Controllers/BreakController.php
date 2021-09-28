<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ShiftBreak;
use Illuminate\Support\Facades\DB;
class BreakController extends Controller
{
    //Send the break type page
    public function index()
    {
        $breakTypeData = ShiftBreak::getBreakTypesOfOrganisations(session('org_id'));
        return view('job.break_type',compact('breakTypeData'));
    }

    //Store the type of the break post request
    public function storeBreakType(Request $request)
    {
//        $this->validate($request, [
//            'name' =>  'required|string|max:64',
//            'description' =>  'required|string|max:64',
//            'basic_salary' => 'required',
//            'pay_type' => 'required',
//        ]);
        DB::table('break_types')->insert(
            array(
                'organisation_id'     =>   session('org_id'),
                'name'   =>   $request->name,
                'description'   =>   $request->description,
                'type'   =>   $request->type,
                'hours'   =>   $request->hours,
                'mins'   =>   $request->mins,
                'can_end_earlier'   =>   $request->can_end_earlier,
                'send_reminder'   =>   $request->send_reminder,
                'prompt_when_hrs'   =>   $request->prompt_when_hrs,
                'prompt_when_mins'   =>   $request->prompt_when_mins,
                'created_by'   =>   session('user_id'),
            )
        );
        return redirect('/dashboard/account/breaks');
    }

    //adds the break for a shift
    public function addShiftBreak(Request $request)
    {
        $dt = Carbon::now();
        $now_time = $dt->toTimeString(); //14:15:16
        ShiftBreak::addShiftBreak($request->shift_id, $request->break_type_id, $now_time);
        Session::flash('message', 'Your Shift Break at '.$request->$now_time.' has began now. Have a nice break (:');
        Session::flash('alert-class', 'alert-success');
        return response()->json(['success'=>"break activated!"]);
    }

    public function get(Request $request)
    {
        $request->session()->put('name','Jenifer');
        echo "Data has been added to the session";
    }

    public function deleteSessionData(Request $request)
    {
        $request->session()->forget('name');
        echo "Data has been removed from the session";
    }
}
