<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisation;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    protected function store(LoginRequest $request)
    {
        $request->authenticate();
        $user = User::where('email','=',$request->email)->first();
        $organisation = Organisation::where('owner','=',$user->id)->first();
        $request->session()->put('user_id', $user->id);
        $request->session()->put('email', $user->email);
        $request->session()->put('user_name', $user->user_name);
        $request->session()->put('position', $user->position);
        if ($user->position = 1 and $organisation != null)
        {
            $request->session()->put('org_id', $organisation->id);
        }
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
