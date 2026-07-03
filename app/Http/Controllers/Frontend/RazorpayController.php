<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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

        if ($plan == '7_day')   return $from->copy()->addDays(7);
        if ($plan == '1_month') return $from->copy()->addMonth();
        if ($plan == '6_month') return $from->copy()->addMonths(6);
        if ($plan == '1_year')  return $from->copy()->addYear();

        return $from->copy()->addMonth();
    }

    private function getTotalCount($plan)
    {
        if ($plan == '7_day')   return 4;    // TEMP test — 4 weeks only

        if ($plan == '1_month') return 360;  // 360 months = 30 years
        if ($plan == '6_month') return 60;   // 60 cycles = 30 years
        if ($plan == '1_year')  return 30;   // 30 cycles = 30 years

        return 30;
    }

    public function createOrder(Request $request)
    {
        $planId = config('services.razorpay.plans.' . $request->plan);

        if (!$planId) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid plan'
            ], 422);
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

            // Prevent duplicate processing
            $existing = Subscription::where('razorpay_payment_id', $request->razorpay_payment_id)->first();
            if ($existing) {
                return response()->json([
                    'success' => true,
                    'message' => 'Already activated'
                ]);
            }

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
            Log::error('Payment verification failed', [
                'user_id'         => auth()->id(),
                'payment_id'      => $request->razorpay_payment_id,
                'subscription_id' => $request->razorpay_subscription_id,
                'plan'            => $request->plan,
                'amount'          => $request->amount,
                'error'           => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function webhook(Request $request)
    {
        // Verify signature
        $signature = $request->header('X-Razorpay-Signature');
        $expected  = hash_hmac(
            'sha256',
            $request->getContent(),
            env('RAZORPAY_WEBHOOK_SECRET')
        );

        if (!hash_equals($expected, $signature)) {
            return response('Invalid signature', 400);
        }

        $event = $request->input('event');
        $subId = $request->input('payload.subscription.entity.id');

        Log::info('Razorpay Webhook Received', [
            'event' => $event,
            'subId' => $subId
        ]);

        // ── Auto Renewal ──
        if ($event === 'subscription.charged') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $paymentId = $request->input('payload.payment.entity.id');
                $exists    = Subscription::where('razorpay_payment_id', $paymentId)->first();

                if (!$exists) {
                    $newExpiry = $this->getExpiry(
                        $sub->plan_name,
                        Carbon::parse($sub->expiry_date)
                    );

                    Subscription::create([
                        'user_id'                  => $sub->user_id,
                        'plan_name'                => $sub->plan_name,
                        'amount'                   => $sub->amount,
                        'razorpay_subscription_id' => $subId,
                        'razorpay_payment_id'      => $paymentId,
                        'start_date'               => Carbon::now(),
                        'expiry_date'              => $newExpiry,
                        'status'                   => 'paid',
                    ]);

                    $sub->user->update([
                        'subscription_expiry' => $newExpiry,
                        'is_premium'          => 1,
                    ]);
                }
            }
        }

        // ── Cancelled ──
        if ($event === 'subscription.cancelled') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'cancelled']);
                $sub->user->update(['is_premium' => 0]);
            }
        }

        // ── Halted (payment failed multiple times) ──
        if ($event === 'subscription.halted') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'halted']);
                $sub->user->update(['is_premium' => 0]);
            }
        }

        // ── Paused ──
        if ($event === 'subscription.paused') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'paused']);
                $sub->user->update(['is_premium' => 0]);
            }
        }

        // ── Resumed ──
        if ($event === 'subscription.resumed') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'paid']);
                $sub->user->update(['is_premium' => 1]);
            }
        }

        // ── Payment Failed ──
        if ($event === 'payment.failed') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'payment_failed']);
            }
        }

        // ── Refund Created ──
        if ($event === 'refund.created') {
            $paymentId = $request->input('payload.refund.entity.payment_id');
            $sub = Subscription::where('razorpay_payment_id', $paymentId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'refund_initiated']);
                $sub->user->update(['is_premium' => 0]);
            }
        }

        // ── Refund Processed ──
        if ($event === 'refund.processed') {
            $paymentId = $request->input('payload.refund.entity.payment_id');
            $sub = Subscription::where('razorpay_payment_id', $paymentId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'refunded']);
                $sub->user->update(['is_premium' => 0]);
            }
        }

        // ── Completed ──
        // With totalCount = 30 years this will practically NEVER fire automatically
        // Only fires if admin manually completes from admin panel
        // But just in case, handle it here too
        if ($event === 'subscription.completed') {
            $sub = Subscription::where('razorpay_subscription_id', $subId)
                ->latest()->first();

            if ($sub) {
                $sub->update(['status' => 'completed']);
                $sub->user->update(['is_premium' => 0]);
            }
        }

        return response('OK', 200);
    }


    // Old webhook updated on 04-07-2026 

    // public function webhook(Request $request)
    // {
    //     // Verify signature
    //     $signature = $request->header('X-Razorpay-Signature');
    //     $expected  = hash_hmac(
    //         'sha256',
    //         $request->getContent(),
    //         env('RAZORPAY_WEBHOOK_SECRET')
    //     );

    //     if (!hash_equals($expected, $signature)) {
    //         return response('Invalid signature', 400);
    //     }

    //     $event = $request->input('event');
    //     $subId = $request->input('payload.subscription.entity.id');

    //     Log::info('Razorpay Webhook Received', [
    //         'event' => $event,
    //         'subId' => $subId
    //     ]);

    //     // ── Auto Renewal (subscription.charged) ──
    //     // This is the ONLY automatic event we handle
    //     // because money is already collected from user
    //     // so we must extend their access
    //     if ($event === 'subscription.charged') {
    //         $sub = Subscription::where('razorpay_subscription_id', $subId)
    //             ->latest()->first();

    //         if ($sub) {
    //             // Prevent duplicate
    //             $paymentId = $request->input('payload.payment.entity.id');
    //             $exists = Subscription::where('razorpay_payment_id', $paymentId)->first();

    //             if (!$exists) {
    //                 $newExpiry = $this->getExpiry(
    //                     $sub->plan_name,
    //                     Carbon::parse($sub->expiry_date)
    //                 );

    //                 Subscription::create([
    //                     'user_id'                  => $sub->user_id,
    //                     'plan_name'                => $sub->plan_name,
    //                     'amount'                   => $sub->amount,
    //                     'razorpay_subscription_id' => $subId,
    //                     'razorpay_payment_id'      => $paymentId,
    //                     'start_date'               => Carbon::now(),
    //                     'expiry_date'              => $newExpiry,
    //                     'status'                   => 'paid',
    //                 ]);

    //                 $sub->user->update([
    //                     'subscription_expiry' => $newExpiry,
    //                     'is_premium'          => 1,
    //                 ]);
    //             }
    //         }
    //     }

    //     // ── ALL OTHER EVENTS — just log, admin handles manually ──
    //     // subscription.activated  → admin handles
    //     // subscription.cancelled  → admin handles
    //     // subscription.halted     → admin handles
    //     // subscription.paused     → admin handles
    //     // subscription.resumed    → admin handles
    //     // subscription.completed  → admin handles
    //     // payment.failed          → admin handles
    //     // refund.created          → admin handles
    //     // refund.processed        → admin handles

    //     Log::info('Webhook event received — admin action required', [
    //         'event' => $event,
    //         'subId' => $subId
    //     ]);

    //     return response('OK', 200);
    // }
    
}
