<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (session('role_id') == 1 or session('role_id') == 2)
        {
            $user_id = session('user_id');
            $todayShiftData = DB::select( DB::raw("SELECT s.date, s.scheduled_from, s.scheduled_to, u.name, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from),60)),'m') AS duration
                                                    FROM  shifts s
                                                    JOIN users u on u.id = s.user_id
                                                    where s.status =1 and u.status=1 and DATE(date) = CURDATE()
                                                    order by s.date desc;"));

            $tomorrowShiftData = DB::select( DB::raw("SELECT s.date, s.scheduled_from, s.scheduled_to, u.name, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from),60)),'m') AS duration
                                                        FROM  shifts s
                                                        JOIN users u on u.id = s.user_id
                                                        where s.status =1 and u.status=1 and DATE(date) = (CURDATE() + interval 1 day)
                                                        order by s.date desc;"));
            $overtimeData = DB::select( DB::raw("SELECT u.name, u.contracted_hours, SUM(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_in, s.clock_out)/60))) AS worked_hours
                                                        FROM  shifts s
                                                                  JOIN users u on u.id = s.user_id
                                                        where s.status =1 and u.status=1 and YEARWEEK(date) = YEARWEEK(NOW())
                                                        GROUP BY u.contracted_hours
                                                        HAVING worked_hours >= u.contracted_hours
                                                        order by s.date desc ;"));
            $chatData = DB::select( DB::raw("SELECT u.name, c.body, c.created_at
                                                    FROM  ch_messages c
                                                              JOIN users u on u.id = c.to_id
                                                    where u.status=1 and u.id= $user_id
                                                    ORDER BY c.created_at DESC LIMIT 10;"));
//            echo '<pre>';
//            var_dump($chatData);
//            echo '</pre>';
//            exit();
        }
        else
        {
            $user_id = session('user_id');
            $todayShiftData = DB::select( DB::raw("SELECT s.date, s.scheduled_from, s.scheduled_to, u.name, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from),60)),'m') AS duration
                                                    FROM  shifts s
                                                    JOIN users u on u.id = s.user_id
                                                    where s.status =1 and u.status=1 and u.id=$user_id and DATE(date) = CURDATE()
                                                    order by s.date desc;"));

            $tomorrowShiftData = DB::select( DB::raw("SELECT s.date, s.scheduled_from, s.scheduled_to, u.name, CONCAT(FLOOR(ABS(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from)/60)),'h ',ABS(MOD(TIMESTAMPDIFF(minute,s.scheduled_to, s.scheduled_from),60)),'m') AS duration
                                                        FROM  shifts s
                                                        JOIN users u on u.id = s.user_id
                                                        where s.status =1 and u.status=1 and u.id=$user_id and DATE(date) = (CURDATE() + interval 1 day)
                                                        order by s.date desc;"));
            $overtimeData = DB::select( DB::raw("SELECT u.name, u.contracted_hours, SUM(FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_in, s.clock_out)/60))) AS worked_hours
                                                        FROM  shifts s
                                                                  JOIN users u on u.id = s.user_id
                                                        where s.status =1 and u.status=1 and u.id=$user_id and YEARWEEK(date) = YEARWEEK(NOW())
                                                        GROUP BY u.contracted_hours
                                                        HAVING worked_hours >= u.contracted_hours
                                                        order by s.date desc ;"));
            $chatData = DB::select( DB::raw("SELECT u.name, c.body, c.created_at
                                                    FROM  ch_messages c
                                                              JOIN users u on u.id = c.to_id
                                                    where u.status=1 and u.id= $user_id
                                                    ORDER BY c.created_at DESC LIMIT 10;"));
        }



        /*$data = session()->all();
        var_dump($data);*/
        $role_id = Session('role_id');
        //SUPER ADMIN
        if($role_id == 0)
        {
            return view('dashboard.super_admin', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
        //ADMIN
        elseif($role_id == 1)
        {
            return view('dashboard.dashboard', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
        //EMPLOYER
        elseif($role_id == 2)
        {
            return view('dashboard.dashboard', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
        //MD
        elseif($role_id == 3)
        {
            return view('dashboard.dashboard', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
        //BRANCH MANAGER
        elseif($role_id == 4)
        {
            return view('dashboard.dashboard', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
        //SHIFT MANAGER
        elseif($role_id == 5)
        {
            return view('dashboard.dashboard', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
        //EMOPLOYEE
        elseif($role_id == 6)
        {
            return view('dashboard.dashboard', compact('todayShiftData', 'tomorrowShiftData', 'overtimeData', 'chatData'));
        }
    }
}
