<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControlller extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('logout')->with('Success', 'Berhasil logout');
    }
    public function showlogin()
    {
        return view('admin.pages.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect()->route('landing_page')->with('success', 'Berhasil login');
        } else {
            return redirect()->back()->with('failed', 'Email atau password salah!');
        }
    }
}
