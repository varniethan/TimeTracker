<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\ShiftType;
use Illuminate\Http\Request;

class ShiftTypeController extends Controller
{
    public function index()
    {
        $shiftTypeData = ShiftType::getShiftTypeOrganisations(session('org_id'));
        return view('job.shift_type',compact('shiftTypeData'));
    }

    public function branch_index()
    {
//        $shiftTypeData = ShiftType::getBranchShiftTypeOrganisations(session('org_id'));
        $branchData = Branch::getBrachesOfOrganisations(11);
        foreach ($branchData as $branch)
        {
            print($branch['id']);
        }
        exit();
        return view('job.shift_type',compact('shiftTypeData'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' =>  'required|string|max:64',
//            'description' =>  'required|string|max:64',
//            'basic_salary' => 'required',
//            'pay_type' => 'required',
//        ]);
        ShiftType::create($request->all() + ['organisation_id'=>session('org_id')] +['created_by'=>session('user_id')]);
        return redirect('/dashboard/account/shift_designations');
    }
}
