<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller
{
    public function userData()
    {
        $user = Session('user_id');
        $data = User::where('id','=',$user)->first();
        if($gender = 1)
        {
            $data["gender"] = "Male";
        }
        elseif ($gender = 2)
        {
            $data["gender"] = "Male";
        }
        else
        {
            $data["gender"] = "Male";
        }
        $data["country"] = "United Kingdom";
        return $data;
    }
    public function profile()
    {
        $data = $this->userData();
        return view('employer.employer_profile',['employer'=>$data]);
    }

    public function getEditProfile()
    {
        $data = $this->userData();
        $position = Session('position');

        if($position == 1)
        {
            return view('admin.admin_edit_profile', ['employer'=>$data]);
        }
        elseif($position == 2)
        {
            return view('employer.employer_edit_profile', ['employer'=>$data]);
        }
        elseif($position == 3)
        {
            return view('MD.MD_edit_profile', ['employer'=>$data]);
        }
        elseif($position == 4)
        {
            return view('branch_manager.branch_manager_edit_profile', ['employer'=>$data]);
        }
        elseif($position == 5)
        {
            return view('shift_manager.shift_manager_edit_profile', ['employer'=>$data]);
        }
        elseif($position == 6)
        {
            return view('employee.employee_edit_profile', ['employer'=>$data]);
        }
    }

    public function update(Request $req)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        //$user->user_name = $req->user_name;
        $user->user_name = "MeSET";
        $user->email = $req->email;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->dob = $req->dob;
        //$user->gender = $req->gender;
        $user->gender = "1";
        $user->mobile_number = $req->mobile_number;
        $user->land_number = $req->land_number;
        //$user->postal_code = $req->postal_code;
        $user->postal_code = "MeSET";
        $user->city = $req->city;
        $user->state = $req->state;
        $user->address_1 = $req->address_1;
        $user->address_2 = $req->address_2;
        $user->ni_number = $req->ni_number;
        //$user->position = $req->position;
        $user->position = "3";
        $user->id = $req->id;
        //$user->basic_salary = $req->basic_salary;
        $user->basic_salary = "232";
        //$user->hourly_rate = $req->hourly_rate;
        $user->hourly_rate = "65";
        $user->branch = $req->branch;
        //$user->password = $req->password;
        $user->password ="MeSET";
        $result = $user->save();
        if ($result) {
            return ["result" => "Data is updated"];
        } else {
            return ["result" => "Data is failed"];
        }
    }
}
