<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Organisation;
use App\Models\Position;
use Illuminate\Http\Request;

class OFullShiftsController extends Controller
{
    public function index()
    {
        $Organisationdata = Organisation::where('id','=', session('org_id'))->first();
        $branchData = Branch::getBrachesOfOrganisations($Organisationdata['id']);
        //Sending Positions that the organisation has to the view
        $positionData = Position::getPositionOrganisations($Organisationdata['id']);
        return view('fullShifts.index',compact('branchData', 'positionData'));
    }
}
