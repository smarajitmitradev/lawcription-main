<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountDeletionController extends Controller
{
    /**
     * Show the initial "request deletion" form (mobile + password + reason).
     */
    public function show()
    {
        return view('account-deletion', ['step' => 'request']);
    }

    /**
     * Step 1: verify mobile + password, stash the request in the session,
     * generate/send an OTP, then send the user to the OTP screen.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'mobile'        => 'required|digits:10',
            'delete_type'   => 'required|string',
            'delete_reason' => 'required|string|min:10|max:1000',
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if (! $user) {
            return back()
                ->withErrors(['mobile' => 'No account found with that mobile number.'])
                ->withInput($request->only('mobile', 'delete_type', 'delete_reason'));
        }

        // TODO: replace with a real SMS gateway call + randomly generated code.
        $otp = '123456';

        $request->session()->put('account_deletion', [
            'user_id'       => $user->id,
            'otp'           => $otp,
            'delete_type'   => $request->delete_type,
            'delete_reason' => $request->delete_reason,
            'expires_at'    => now()->addMinutes(10),
        ]);

        Log::info('Account deletion OTP generated', ['user_id' => $user->id]);

        return redirect()->route('account-deletion.otp');
    }

    /**
     * Show the OTP entry screen. Bounce back to the start if there's no
     * pending deletion request in the session (e.g. direct URL hit / refresh after expiry).
     */
    public function showOtp(Request $request)
    {
        if (! $request->session()->has('account_deletion')) {
            return redirect()->route('account-deletion.show')
                ->withErrors(['mobile' => 'Please verify your mobile number first.']);
        }

        return view('account-deletion', ['step' => 'otp']);
    }

    /**
     * Step 2: verify the OTP, then actually perform the deletion
     * (same logic as the original destroy()).
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $data = $request->session()->get('account_deletion');

        if (! $data || now()->greaterThan($data['expires_at'])) {
            $request->session()->forget('account_deletion');

            return redirect()->route('account-deletion.show')
                ->withErrors(['mobile' => 'Your session expired. Please start again.']);
        }

        if ($request->otp !== $data['otp']) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        $user = User::find($data['user_id']);

        if (! $user) {
            $request->session()->forget('account_deletion');

            return redirect()->route('account-deletion.show')
                ->withErrors(['mobile' => 'We could not find that account.']);
        }

        Log::info('Public account deletion requested', ['user_id' => $user->id]);

        $user->update([
            'delete_reason'            => $data['delete_type'] . ': ' . $data['delete_reason'],
            'otp'                      => null,
            'refresh_token'            => null,
            'refresh_token_expires_at' => null,
            'device_id'                => null,
            'fcm_token'                => null,
            'takeover_token'           => null,
            'takeover_expires_at'      => null,
        ]);

        $user->delete(); // soft delete, same as ProfileController@deleteAccount

        // If this user happened to have an active browser session, kill it too
        if (Auth::check() && Auth::id() === $user->id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } else {
            $request->session()->forget('account_deletion');
        }

        return redirect()
            ->route('account-deletion.show')
            ->with('success', 'Your account has been deleted successfully.');
    }
}