<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;
use App\Http\Controllers\MailController;
class UserController extends Controller
{
//    private $userData;
//    public function __construct()
//    {
//        $this->userData = User::getUser(Session('user_id'));
//        var_dump($this->userData);
//        exit();
//    }

    public function profile()
    {
        $userData = User::getUser(Session('user_id'));
//        echo $userData['city']; --> This is how model object is called
//        return view('user.profile')->with('userDeta',$this->userDeta); //An  alternative way of doing this
        return view('user.profile')->with('userData',$userData);
    }

    public function showEditProfile()
    {
        $userData = User::getUser(Session('user_id'));
        $countryData = Country::getAllCountryNames();
        return view('user.edit',compact('userData', 'countryData'));
    }

    protected function edit(request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'mobile_number' => 'required|min:10',
            'land_number' => 'required|min:10',
            'post_code' => 'required|max:64',
            'address_1' => 'required|max:64',
            'address_2' => 'required|max:64',
            'city' => 'required',
            'ni_number' => 'required|max:32|',
            'basic_salary' =>  'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $user = User::findOrFail(Session('user_id'));
        $input = $request->all();
        $user->fill($input)->save();
        $ProfileUpdate = new MailController;
        $ProfileUpdate->sendProfileUpdateEmail($request->first_name, $request->last_name,$user->email);
//        $this->profile();
        return redirect('/profile');
    }
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
//    public function profile()
//    {
//        $data = $this->userData();
//        return view('employer.employer_profile',['employer'=>$data]);
//    }
}
