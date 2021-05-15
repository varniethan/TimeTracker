<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*$data = session()->all();
        var_dump($data);*/
        $position = Session('position');

        if($position == 0)
        {
            return view('admin.admin_dashboard');
        }
        elseif($position == 1)
        {
            return view('employer.all_employer_dashboard');
        }
        elseif($position == 2)
        {
            return view('MD.MD_dashboard');
        }
        elseif($position == 3)
        {
            return view('branch_manager.branch_manager_dashboard');
        }
        elseif($position == 4)
        {
            return view('shift_manager.shift_manager_dashboard');
        }
        elseif($position == 5)
        {
            return view('employee.employee_dashboard');
        }
    }
}
