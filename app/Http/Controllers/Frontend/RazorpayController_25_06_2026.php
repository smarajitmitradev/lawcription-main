<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class RazorpayController extends Controller
{
    private function getApi()
    {
        return new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    private function getExpiry($plan, $from = null)
    {
        $from = $from ?? Carbon::now();

        if ($plan == '7_day') return $from->copy()->addDay(7); // TEMP — remove after live autopay test
        
        if ($plan == '1_month') return $from->copy()->addMonth();
        if ($plan == '3_month') return $from->copy()->addMonths(3);
        if ($plan == '6_month') return $from->copy()->addMonths(6);
        if ($plan == '1_year')  return $from->copy()->addYear();
        if ($plan == '2_year')  return $from->copy()->addYears(2);
        if ($plan == '3_year')  return $from->copy()->addYears(3);

        return $from->copy()->addMonth();
    }

    private function getTotalCount($plan)
    {
        if ($plan == '7_day') return 4;   // TEMP — remove after live autopay test

        if ($plan == '1_month') return 12;
        if ($plan == '3_month') return 4;
        if ($plan == '6_month') return 2;

        return 1; // 1_year, 2_year, 3_year — one billing cycle
    }

    public function createOrder(Request $request)
    {
        $planId = config('services.razorpay.plans.' . $request->plan);

        // TEMPORARY TEST — remove after
        // dd([
        //     'plan_received' => $request->plan,
        //     'plan_id_found' => $planId,
        //     'all_plans'     => config('services.razorpay.plans'),
        // ]);

        if (!$planId) {
            return response()->json(['success' => false, 'message' => 'Invalid plan'], 422);
        }

        $subscription = $this->getApi()->subscription->create([
            'plan_id'     => $planId,
            'total_count' => $this->getTotalCount($request->plan),
            'quantity'    => 1,
            'notes'       => [
                'user_id' => auth()->id(),
                'plan'    => $request->plan,
            ],
        ]);

        return response()->json([
            'success'         => true,
            'subscription_id' => $subscription['id'],
            'key'             => config('services.razorpay.key'),
        ]);
    }

    public function verify(Request $request)
    {
        try {
            $this->getApi()->utility->verifyPaymentSignature([
                'razorpay_subscription_id' => $request->razorpay_subscription_id,
                'razorpay_payment_id'      => $request->razorpay_payment_id,
                'razorpay_signature'       => $request->razorpay_signature,
            ]);

            $expiry = $this->getExpiry($request->plan);

            Subscription::create([
                'user_id'                  => auth()->id(),
                'plan_name'                => $request->plan,
                'amount'                   => $request->amount,
                'razorpay_subscription_id' => $request->razorpay_subscription_id,
                'razorpay_payment_id'      => $request->razorpay_payment_id,
                'razorpay_signature'       => $request->razorpay_signature,
                'start_date'               => Carbon::now(),
                'expiry_date'              => $expiry,
                'status'                   => 'paid',
            ]);

            auth()->user()->update([
                'subscription_expiry' => $expiry,
                'current_plan'        => $request->plan,
                'is_premium'          => 1,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function webhook(Request $request)
    {
        $signature = $request->header('X-Razorpay-Signature');
        $expected  = hash_hmac('sha256', $request->getContent(), env('RAZORPAY_WEBHOOK_SECRET'));

        if (!hash_equals($expected, $signature)) {
            return response('Invalid signature', 400);
        }

        $event = $request->input('event');

        if ($event === 'subscription.charged') {
            $subId = $request->input('payload.subscription.entity.id');
            $sub   = Subscription::where('razorpay_subscription_id', $subId)->latest()->first();

            if ($sub) {
                $newExpiry = $this->getExpiry($sub->plan_name, Carbon::parse($sub->expiry_date));

                Subscription::create([
                    'user_id'                  => $sub->user_id,
                    'plan_name'                => $sub->plan_name,
                    'amount'                   => $sub->amount,
                    'razorpay_subscription_id' => $subId,
                    'razorpay_payment_id'      => $request->input('payload.payment.entity.id'),
                    'start_date'               => Carbon::now(),
                    'expiry_date'              => $newExpiry,
                    'status'                   => 'paid',
                ]);

                $sub->user->update(['subscription_expiry' => $newExpiry]);
            }
        }

        if ($event === 'subscription.cancelled') {
            Subscription::where('razorpay_subscription_id', $request->input('payload.subscription.entity.id'))
                ->update(['status' => 'cancelled']);
        }

        return response('OK', 200);
    }
}
