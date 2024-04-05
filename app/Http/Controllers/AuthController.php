<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        $validatePassword = Validator::make($request->all(), [
            'password' => 'min:8'
        ]);

        if ($validatePassword->fails()) {
            return redirect()->route('register')->with('failed', 'Please input the minimum password of 8 characters!');
        } else if ($request->password !== $request->pwdrpt) {
            return redirect()->route('register')->with('failed', 'Password is not the same!');
        }

        $user = new User;

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';

        $user->save();

        return redirect()->route('login')->with('success', 'Account succesfully registered! Please proceed to log in');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
