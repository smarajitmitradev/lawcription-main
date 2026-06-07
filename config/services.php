<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'razorpay' => [
        'key' => env('RAZORPAY_KEY_ID'),
        'secret' => env('RAZORPAY_KEY_SECRET'),
        'plans'  => [
            '1_month' => env('RAZORPAY_PLAN_1_MONTH'),
            '3_month' => env('RAZORPAY_PLAN_3_MONTH'),
            '6_month' => env('RAZORPAY_PLAN_6_MONTH'),
            '1_year'  => env('RAZORPAY_PLAN_1_YEAR'),
            '2_year'  => env('RAZORPAY_PLAN_2_YEAR'),
            '3_year'  => env('RAZORPAY_PLAN_3_YEAR'),
        ],
    ],

];
