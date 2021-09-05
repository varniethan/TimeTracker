<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Organisation;
use App\Models\Position;
use App\Models\Holiday;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($Organisationdata['id']);
        $employeeData = User::getAllEmployeesByOrgId($Organisationdata['id']);
        //Sending Positions that the organisation has to the view
        $positionData = Position::getPositionOrganisations($Organisationdata['id']);
        $holidayTypeData = Holiday::getHolidayTypesOfOrganisations($Organisationdata['id']);
        $holidayData = Holiday::getHolidayOfOrganisations($Organisationdata['id']);
//        $holidayData = Holiday::getholidayOfOrganisations(session('org_id'));
        return view('holiday.index',compact('branchData', 'positionData','employeeData', 'holidayTypeData', 'holidayData'));
    }

    public function holiday_type_index()
    {
        $holidayTypeData = Holiday::getHolidayTypesOfOrganisations(session('org_id'));
        return view('holiday.holiday_type',compact('holidayTypeData'));
    }

    public function holiday_type_store(Request $request)
    {
//        $this->validate($request, [
//            'name' =>  'required|string|max:64',
//            'description' =>  'required|string|max:64',
//            'basic_salary' => 'required',
//            'pay_type' => 'required',
//        ]);
        HolidayType::create($request->all() + ['organisation'=>session('org_id')] +['created_by'=>session('user_id')]);
        return redirect('/dashboard/account/positions');
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
        $this->validate($request, [
            'user_id' =>  'required|string|max:64',
            'date' => 'required',
            'no_of_hours' => 'required|integer',
            'no_of_mins' => 'required|integer',
            'holiday_type_id' => 'required',
            'notes' => 'required|min:3|max:1000',
        ]);

        DB::table('user_holidays')->insert([
            'holiday_type_id' => $request->holiday_type_id,
            'organisation_id' => session('org_id'),
            'user_id' => $request->user_id,
            'date' => $request->date,
            'no_of_hours' =>  $request->no_of_hours,
            'no_of_mins' =>  $request->no_of_mins,
            'notes' =>  $request->notes,
            'status' =>  1,
            'created_by' => session('user_id'),
        ]);

        return redirect('/holiday');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeType(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|string|max:64',
            'notes' => 'required|min:3|max:1000',
            'pay_rate' => 'required|integer',
        ]);
        if($request->has('is_payed')){
            $is_payed = 1;
        }else{
            $is_payed = 0;
        }

        DB::table('holiday_types')->insert([
            'organisation_id' => session('org_id'),
            'name' =>  $request->name,
            'description' =>  $request->description,
            'is_payed' =>  $is_payed,
            'status' =>  1,
            'created_by' =>  session('user_id'),
        ]);
        return redirect('/dashboard/account/holiday_type');
    }

    /**
     * Approve a Holiday.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $holidayData = Holiday::findOrFail($id);
        if ($holidayData->approved == "1")
        {
            Session::flash('message', 'The Holiday has been already approved by '.User::getUser($holidayData->updated_by)['first_name'].' '.User::getUser($holidayData->updated_by)['last_name'].' (-_-)');
            Session::flash('alert-class', 'alert-info');
            return redirect('/holiday');
        }
        else if ($holidayData->approved == "0")
        {
            $holidayData->approved = '1';
            $holidayData->save();
            Session::flash('message', 'The Holiday has been approved :)');
            Session::flash('alert-class', 'alert-success');
            return redirect('/holiday');
        }
    }

    /**
     * Unapprove a Holiday.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unapprove($id)
    {
        $holidayData = Holiday::findOrFail($id);
        if ($holidayData->approved == "0")
        {
            Session::flash('message', 'The Holiday has been already unapproved by '.User::getUser($holidayData->updated_by)['first_name'].' '.User::getUser($holidayData->updated_by)['last_name'].' (-_-)');
            Session::flash('alert-class', 'alert-dark');
            return redirect('/holiday');
        }
        else if ($holidayData->approved == "1")
        {
            $holidayData->approved = '0';
            $holidayData->updated_by = session('user_id');
            $holidayData->save();
            Session::flash('message', 'The Holiday has been unapproved (:');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/holiday');
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
        $holidayData = Holiday::findOrFail($id);
        if ($holidayData->approved == "0")
        {
            $holidayData->status = '0';
            $holidayData->updated_by = session('user_id');
            $holidayData->save();
            Session::flash('message', 'The Holiday on '.$holidayData->date.' by '.User::getUser($holidayData->user_id)['first_name'].' '.User::getUser($holidayData->user_id)['last_name'].' at '.$holidayData->clock_in.' has been successfully deleted (-_-).');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/holiday');
        }
        else if ($holidayData->approved == "1")
        {
            Session::flash('message', 'Cannot be deleted at this time. Please unapprove the Holiday to delete it.');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/holiday');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCheckedHolidays(Request $request)
    {
        $ids = $request->ids;
        Holiday::whereIn('id', $ids)->update(['status'=>'0'], ['updated_by'=>session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected Holidays has been deleted (-_-)');
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
    public function approveCheckedHolidays(Request $request)
    {
        $ids = $request->ids;
        Holiday::whereIn('id', $ids)->update(['approved'=>'1'], ['updated_by'=>session('user_id')]);
        Session::flash('message', 'All '.count($ids).' selected Holidays has been approved :)');
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
    public function unapproveCheckedHolidays(Request $request)
    {
        $ids = $request->ids;
        Holiday::whereIn('id', $ids)->update(['approved'=>'0']);
        Session::flash('message', 'All '.count($ids).' selected Holidays has been un approved (:');
        Session::flash('alert-class', 'alert-danger');
        return response()->json(['success'=>"all un approved!"]);
    }
}
