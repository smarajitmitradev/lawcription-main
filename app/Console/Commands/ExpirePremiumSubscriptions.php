<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExpirePremiumSubscriptions extends Command
{
    protected $signature = 'subscriptions:expire-premium';
    protected $description = 'Set is_premium = 0 for users whose subscription_expiry has passed';

    public function handle()
    {
        $now = Carbon::now();

        $count = User::where('is_premium', true)
            ->whereNotNull('subscription_expiry')
            ->where('subscription_expiry', '<', $now)
            ->update(['is_premium' => 0]);

        Log::info("ExpirePremiumSubscriptions: {$count} user(s) demoted from premium at {$now}");
        $this->info("Done. {$count} user(s) updated.");

        return self::SUCCESS;
    }
}