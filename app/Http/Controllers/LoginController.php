<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLogin() {
        return view('admin.login.index');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.welcome');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Access denied.');
        }
    }

    return redirect()->back()->with('error', 'Invalid email or password.');
}

}
