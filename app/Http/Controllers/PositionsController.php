<?php

namespace App\Http\Controllers;

use App\View\Components\button\view;
use Illuminate\Http\Request;
use App\Models\Position;


class PositionsController extends Controller
{
    public function index()
    {
        $positionData = Position::getPositionOrganisations(session('org_id'));
        return view('job.positions',compact('positionData'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' =>  'required|string|max:64',
//            'description' =>  'required|string|max:64',
//            'basic_salary' => 'required',
//            'pay_type' => 'required',
//        ]);
//        echo "Hi";
//        exit();
        Position::create($request->all() + ['organisation'=>session('org_id')] +['created_by'=>session('user_id')]);
        return redirect('/dashboard/account/positions');
    }
}
