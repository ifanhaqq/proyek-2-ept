<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MobileAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'device_name' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect!']
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        if ($request->password !== $request->password_confirmation) {
            throw ValidationException::withMessages([
                'password_confirmation' => ['You entered the wrong password']
            ]);
        }

        $user = new User;

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';

        $user->save();

        return response()->noContent();
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
