<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user     = Auth::user();
        $sub      = $user ? Subscription::where('user_id', $user->id)
            ->where('status', 'paid')
            ->latest()
            ->first() : null;
        $isActive = $sub && Carbon::parse($sub->expiry_date)->isFuture();
        $planName = $sub->plan_name ?? '';

        // $planLabel = match($planName) {
        //     '1_month' => '1 Month',
        //     '3_month' => '3 Months',
        //     '6_month' => '6 Months',
        //     '1_year'  => '1 Year',
        //     '2_year'  => '2 Years',
        //     '3_year'  => '3 Years',
        //     default   => ucfirst(str_replace('_', ' ', $planName ?: 'N/A')),
        // };

        $planLabel = $planName == '1_month' ? '1 Month' :
            ($planName == '3_month' ? '3 Months' :
            ($planName == '6_month' ? '6 Months' :
            ($planName == '1_year'  ? '1 Year'   :
            ($planName == '2_year'  ? '2 Years'  :
            ($planName == '3_year'  ? '3 Years'  :
            ucfirst(str_replace('_', ' ', $planName ?: 'N/A')))))));

        return view('frontend.subscription.index', compact(
            'sub',
            'isActive',
            'planLabel',
            'planName'
        ));
    }
}
