<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\OtpService;

class AuthController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|digits:10'
        ]);

        $mobile = $request->mobile_number;

        $otp = rand(100000, 999999);

        $user = User::where('mobile_number', $mobile)->first();

        if ($user) {

            $user->update([
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5)
            ]);
        } else {

            $user = User::create([
                'mobile_number'       => $mobile,
                'country_code'        => '+91',
                'otp'                 => $otp,
                'otp_expires_at'      => now()->addMinutes(5),
                'is_profile_complete' => 0
            ]);
        }

        session([
            'login_mobile' => $mobile
        ]);

        $response = $this->otpService->sendOtp($mobile, $otp);

        if (
            isset($response['Status']) &&
            strtolower($response['Status']) == 'success'
        ) {
            return redirect()->route('verify.otp.page');
        }

        return back()->with(
            'error',
            $response['Details'] ?? $response['Message'] ?? 'Unable to send OTP'
        );
    }

    public function verifyOtpPage()
    {
        if (!session()->has('login_mobile')) {
            return redirect()->route('login');
        }

        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $mobile = session('login_mobile');

        if (!$mobile) {
            return redirect()
                ->route('login')
                ->with('error', 'Session expired. Please login again.');
        }

        $user = User::where('mobile_number', $mobile)
            ->where('otp', $request->otp)
            ->first();

        if (!$user) {
            return back()->with('error', 'Invalid OTP');
        }

        if (
            !$user->otp_expires_at ||
            now()->gt($user->otp_expires_at)
        ) {
            return back()->with('error', 'OTP Expired');
        }

        Auth::login($user);

        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        session()->forget('login_mobile');

        if ((int)$user->is_profile_complete !== 1) {

            return redirect()
                ->route('complete.profile')
                ->with('success', 'OTP verified successfully.');
        }

        return redirect()
            ->route('home')
            ->with('success', 'Login successful.');
    }


    public function completeProfilePage()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }

        return view('auth.complete-profile', compact('user'));
    }


    public function saveProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'user_type' => 'required',
            'email'      => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        $user->update([

            'first_name' => $request->first_name,

            'last_name' => $request->last_name,

            'full_name' =>
            $request->first_name . ' ' . $request->last_name,

            'email' => $request->email,

            'user_type' => $request->user_type,

            'is_profile_complete' => 1
        ]);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
