<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'full_name',
        'first_name',
        'last_name',
        'mobile_number',
        'country_code',
        'email',
        'otp',
        'otp_expires_at',
        'refresh_token',
        'device_id',
        'fcm_token',
        'temp_fcm_token',
        'user_type',
        'is_profile_complete',
        'is_premium',
        'premium_expiry_date',
        'img',
        'takeover_token',
        'takeover_expires_at',
        'refresh_token_expires_at',
        'platform',
        'app_id',
        'delete_reason',  // ← existing
        'subscription_expiry',
        'current_plan',
    ];

    protected $hidden = [
        'otp',
        'refresh_token',
        'remember_token',
        'password'
    ];

    protected $casts = [
        'otp_expires_at'           => 'datetime',
        'premium_expiry_date'      => 'datetime',
        'takeover_expires_at'      => 'datetime',
        'refresh_token_expires_at' => 'datetime',
        'deleted_at'               => 'datetime', // ← add for SoftDeletes
        'is_profile_complete'      => 'boolean',
        'is_premium'               => 'boolean',
    ];

    public function getNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public function isPremiumActive()
    {
        return $this->is_premium &&
            $this->premium_expiry_date &&
            now()->lt($this->premium_expiry_date);
    }

    public function profileCompleted()
    {
        return (bool) $this->is_profile_complete;
    }
}