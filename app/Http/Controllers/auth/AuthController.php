<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except('_token'))) {
            return redirect()->route('admin.dashboard')->with([
                'success' => 'Logged in!',
            ]);
        } else {
            return back()->with([
                'failure' => 'Invalid Combination!',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'success' => 'Successfully logged out!',
        ]);
    }
}
