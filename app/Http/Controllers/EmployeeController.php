<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CountryController;
use App\Models\Branch;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Organisation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $seeAllEmployees = array(1 ,2, 3);
        $seeBranchEmployee = array(4,5);
        $positionData = Position::getPositionOrganisations(session('org_id'));
        //All employees who has same organisation id is displayed
        if (in_array( Session('role_id'), $seeAllEmployees))
        {
            $employeeData = User::getAllEmployeesByOrgId(session('org_id'));
            return view('employee.index', compact('employeeData', 'positionData'));
        }
        elseif (in_array( Session('role_id'), $seeBranchEmployee))
        {
            $branch = Branch::getBranchOfManager(session('user_id'));
            $branchData = Branch::getBranchOfUserByBranchId($branch->branch_id);
            $employeeData = User::getBranchEmployees($branch->branch_id);
            return view('employee.index', compact('employeeData', 'positionData','branchData'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Organisationdata = Organisation::where('id','=', session('org_id'))->first();
        //Sending Cities that the country has to the view
        $cityData = City::getCitiesOfOrganisation($Organisationdata['id']);
        //Sending Branches that the organisation has to the view
        $branchData = Branch::getBrachesOfOrganisations($Organisationdata['id']);
        //Sending Positions that the organisation has to the view
        $positionData = Position::getPositionOrganisations($Organisationdata['id']);
        $invitationId = substr(str_shuffle("0123456789abcdefghij"), 0, 6);

        //Load index view
        return view('employee.create',compact('cityData','branchData', 'positionData','invitationId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'first_name' =>  'required|string|max:64',
           'last_name' =>  'required|string|max:64',
           'dob' => 'required',
            'gender' => 'required',
//            'name' => 'required',
            'mobile_number' => 'required|min:8',
            'land_number' => 'max:15',
            'email' => 'required|email|max:64',
            'post_code' => 'required|max:6',
            'address_1' => 'required|max:64',
            'address_2' => 'required|max:64',
            'city' => 'required',
            'ni_number' => 'required|max:32|',
//            'branch_id' => 'required|integer',
            'position_id' => 'required|integer',
            'role_id' => 'required|integer',
            'basic_salary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'user_name' => 'required|string|max:32|',
        ]);
        User::create($request->all()  + ['organisation_id'=>session('org_id')] + ['created_by'=>session('user_id')]);
        $NewEmployee = new MailController;
        $NewEmployee->sendEmployeeCreatedEmail($request->first_name, $request->last_name,$request->email, $request->password);
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeData = User::findOrFail($id);
        return view('employee.show', compact('employeeData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeData = User::getUser($id);
        $countryData = Country::getAllCountryNames();
        return view('employee.edit',compact('employeeData', 'countryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
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
        $user = User::findOrFail($id);
        $input = $request->all();
        $user->fill($input)->save();
        $ProfileUpdate = new MailController;
        $ProfileUpdate->sendProfileUpdateEmail($request->first_name, $request->last_name,$user->email);
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $employeeData = User::findOrFail($id);
        $employeeData->delete();
        return redirect()->route('organisation.index');
    }
}
