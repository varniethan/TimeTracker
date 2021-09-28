<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Models\Position;
use App\Models\Shift;
use App\Models\ShiftType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\ShiftBreak;
use function Symfony\Component\String\s;
use Session;

class QrCodeController extends Controller
{
    public function fullshift_store($id)
    {
        $branchData = Branch::checkBranchInOrganisation($id, Session('org_id'));
        if ($branchData != false)
        {
            Branch::updateQrToken($id);
            $today = Carbon::now()->format('Y-m-d'); //yyyy-mm-dd etc
            $todayShiftData = Shift::getTodayUserShifts( Session('user_id'), $today, $branchData['id']);
//            return redirect('/qr_full_shifts',compact('today_shifts'));
            $Organisationdata = Organisation::where('id','=', session('org_id'))->first();
//            $branchData = Branch::getBrachesOfOrganisations($Organisationdata['id']);
            $shiftBreakTypeData = ShiftBreak::getBreakTypesOfOrganisations(session('org_id'));
            $employeeData = User::getAllEmployeesByOrgId($Organisationdata['id']);
            $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
            $positionData = Position::getPositionOrganisations($Organisationdata['id']);
            return view('shifts.qr_full_shifts_select',compact('branchData', 'shiftBreakTypeData','positionData','employeeData', 'shiftTypeData', 'todayShiftData'));
        }
        else
        {
            Session::flash('message', 'The Branch you have scanned is not in your organisation or could not identify the branch');
            Session::flash('alert-class', 'alert-warning');
            return redirect('/dashboard');
        }
    }


    public function openshifts_store($request)
    {

        $current_time = Carbon::now();
//        echo $current_time->format('H:i:s');
//        echo $current_time->format('Y:m:d');
//        $request->merge(['clock_in' => $current_time->format('H:i:s')]);
//        $request->merge(['date' => $current_time->toDateString()]);
        Shift::create($request->all() + ['organisation_id'=>session('org_id')] + ['full_or_open'=> 1] + ['date'=> $current_time->toDateString()] +['clock_in'=> $current_time->format('H:i:s')] +['approved'=> 0] + ['created_by'=>session('user_id')]);
        return redirect('/open_shifts');
    }
}
