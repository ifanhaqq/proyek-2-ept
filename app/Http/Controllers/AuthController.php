<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($request->user()->role === 'admin') return redirect()->route('admin.dashboard');
            else if ($request->user()->role === 'user') return redirect()->route('user.dashboard');
        }

        return back()->with('failed', 'Your credentials do not match our record!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
