<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
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

    public function store(Request $request)
    {
        if ($request->password !== $request->pwdrpt) {
            return redirect()->route('register')->with('failed', 'Password is not same');
        } else {
            dd();
        }

        // $user = new User;

        // $user->name = $request->name;
        // $user->nim = $request->nim;
        // $user->email = $request->email;
        // $user->password = $request->password;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
