<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class EmailController extends Controller
{
    public function verificationNotice()
    {
        return view('pages.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            $user = User::find($request->user()->id);

            return redirect()->route("user.dashboard");
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $user = User::find($request->user()->id);
        $user->status = 'active';
        $user->save();

        return redirect()->route("user.dashboard");
    }

    public function sendNotification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route("user.dashboard");
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Verification link sent to your Email!');
    }

    
}
