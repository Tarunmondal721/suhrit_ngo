<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Cache;

class OTPController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $otp = rand(100000, 999999);
        Cache::put('otp_' . $request->email, $otp, now()->addMinutes(5));

        Mail::to($request->email)->send(new OTPMail($otp));

        return response()->json(['message' => 'OTP sent successfully your email']);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $cachedOtp = Cache::get('otp_' . $request->email);

        if ($cachedOtp && $cachedOtp == $request->otp) {
            Cache::forget('otp_' . $request->email);
            return response()->json(['message' => 'OTP verified successfully']);
        }

        return response()->json(['error' => 'Invalid or expired OTP'], 400);
    }
}
