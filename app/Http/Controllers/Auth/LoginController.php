<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organisation;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $request->authenticate();
//        $user = User::where('email','=',$request->email)->first();
        $userData = User::getUserByEmail($request->email);
//        $organisation = Organisation::where('owner','=',$user->id)->first();
        $request->session()->put('user_id', $userData['id']);
        $request->session()->put('email', $userData['email']);
        $request->session()->put('user_name', $userData['user_name']);
        $request->session()->put('role_id', $userData['role_id']);
        $request->session()->put('org_id', $userData['organisation_id']);
//        if ( $userData['role_id'] >0 && $userData['role_id'] < 3) //Admins(1s) and Employers(2s) will get filtered out
//        {
//            $organisationData = Organisation::getEmployersAllOrganisations(Session('user_id'));
//            $request->session()->put('org_id',$organisationData['id']);
//
//        }
//        elseif ($userData['role_id'] = 3)
//        {
//            $organisationData = Organisation::getMDOrganisation(Session('user_id'));
//            $request->session()->put('org_id',$organisationData['id']);
//        }
//        elseif ($userData['role_id'] > 3)
//        {
//            $organisationData = Organisation::getEmployeeOrganisation(Session('user_id'));
//            $request->session()->put('org_id',$organisationData['id']);
//
//        }
//        if ($user->role_id = 2 and $organisation != null)
//        {
//            $request->session()->put('org_id', $organisation->id);
//        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
