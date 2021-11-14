<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
class PaySlipController extends Controller
{
    public function index()
    {
        $employeeData = User::getEmployeesByOrgId(session('org_id'));
        return view('shifts.payslip', compact('employeeData'));
    }

    public function generatePaySlip(request $request)
    {
        $employee_id = $request->employee_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $employee_id = "";
        $start_date = "";
        $end_date = "";

        if (($request->start_date != null) or ($request->end_date != null))
        {
            $date = ' AND s.date BETWEEN \''.$request->start_date.'\' AND \''.$request->end_date.'\'';
            $uhdate = ' AND uh.date BETWEEN \''.$request->start_date.'\' AND \''.$request->end_date.'\'';
        }

        if ($request->has('employee_id') and $request->employee_id != '0')
        {
            $employee_id = ' AND u.id ='.$request->employee_id;
        }

        $payData = DB::select( DB::raw("SELECT COUNT(s.id) as no_of_shifts, u.ni_number,o.name as organisation,o.owner,u.first_name, u.last_name, u.id, u.basic_salary, b.name as branch, s.approved,r.name, p.name, u.hourly_rate AS rate, CONCAT(FLOOR(SUM(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))),'h ',ABS(SUM(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))),'m') AS duration, SUM(TRUNCATE((FLOOR(ABS(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in)/60))* u.hourly_rate) + (ABS(MOD(TIMESTAMPDIFF(minute,s.clock_out, s.clock_in),60))*(u.hourly_rate/60)), 2)) AS total_pay
                                            FROM  shifts s
                                                      LEFT JOIN shift_breaks sb on sb.shift_id = s.id
                                                      JOIN users u on u.id = s.user_id
                                                      JOIN organisations o on o.id = u.organisation_id
                                                      JOIN branches b on b.id = s.branch_shift_id
                                                      JOIN shift_types st on st.id = s.shift_type_id
                                                      JOIN roles r on r.id = u.role_id
                                                      JOIN positions p on p.id = u.position_id
                                            WHERE s.status =1 and u.status =1 and b.status=1 and s.approved = 1".$employee_id.$date));

        $holidayData = DB::select( DB::raw("SELECT count(uh.id) as no_of_holidays, ROUND(SUM(uh.no_of_hours+(uh.no_of_mins/60))) AS duration, ROUND(SUM((uh.no_of_hours+(uh.no_of_mins/60)) * ht.pay_rate)) as total_pay
                                                FROM  user_holidays uh
                                                          JOIN users u on u.id = uh.user_id
                                                          JOIN holiday_types ht on ht.id = uh.holiday_type_id
                                                WHERE uh.status = 1".$employee_id.$uhdate));

//                    echo '<pre>';
//            var_dump($payData);
//            echo '</pre>';
//            exit();
//
        //       $pdf = PDF::loadView('pdf.pay_slip_pdf');
//        return $pdf->download('employees.pdf');
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('pdf.pay_slip', compact('payData', 'holidayData', 'start_date', 'end_date'));
    }
}
