<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email|unique:users,email,' . Auth::id(),
            'img'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'user_type' => 'nullable|in:doctor,nurse,pharmacist,lab_technician,medical_student,healthcare_worker,hospital_admin,clinic_owner,other',
        ]);

        $user = Auth::user();

        // Handle image upload
        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($user->img && Storage::disk('public')->exists($user->img)) {
                Storage::disk('public')->delete($user->img);
            }

            $path = $request->file('img')->store('profile_images', 'public');
            $user->img = $path;
        }

        $user->first_name  = $request->first_name;
        $user->last_name   = $request->last_name;
        $user->full_name   = $request->first_name . ' ' . $request->last_name;
        $user->email       = $request->email;
        $user->user_type    = $request->user_type;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'user'    => [
                'full_name'    => $user->full_name,
                'first_name'   => $user->first_name,
                'last_name'    => $user->last_name,
                'email'        => $user->email,
                'img'          => $user->img ? Storage::url($user->img) : null,
                'user_type'    => $user->user_type,
                'is_premium'   => $user->is_premium,
                'mobile_number'=> $user->country_code . ' ' . $user->mobile_number,
                'member_since' => $user->created_at->format('d M Y'),
            ]
        ]);
    }


    public function update_avatr(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = Auth::user();

        // Delete old image
        if ($user->img && Storage::disk('public')->exists($user->img)) {
            Storage::disk('public')->delete($user->img);
        }

        // Store new image
        $path = $request->file('img')->store('profile_images', 'public');
        $user->img = $path;
        $user->save();

        return response()->json([
            'success'  => true,
            'img_url'  => asset('storage/' . $path),
            'message'  => 'Avatar updated successfully.',
        ]);
    }
}