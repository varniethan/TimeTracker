<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayTypeController extends Controller
{
    public function index()
    {
        $positionData = Position::getPositionOrganisations(session('org_id'));
        return view('job.positions',compact('positionData'));
    }

    public function store(Request $request)
    {
        DB::table('holiday_types')->insert([
            'organisation_id' =>  Session(org_id),
            'name' =>  $request->name,
            'description' =>  $request->description,
            'is_payed' =>  $request->is_payed,
            'status' =>  1,
            'created_by' => Session('user_id'),
        ]);
        return redirect('/dashboard/account/holiday_type');
    }
}
