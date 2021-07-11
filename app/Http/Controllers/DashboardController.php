<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        /*$data = session()->all();
        var_dump($data);*/
        $role_id = Session('role_id');
        if($role_id == 0)
        {
            return view('dashboard.super_admin');
        }
        elseif($role_id == 1)
        {
            return view('dashboard.dashboard');
        }
        elseif($role_id == 2)
        {
            return view('dashboard.dashboard');
        }
        elseif($role_id == 3)
        {
            return view('dashboard.dashboard');
        }
        elseif($role_id == 4)
        {
            return view('dashboard.dashboard');
        }
        elseif($role_id == 5)
        {
            return view('dashboard.dashboard');
        }
        elseif($role_id == 6)
        {
            return view('dashboard.dashboard');
        }
    }
}
