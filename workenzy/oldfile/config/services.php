<?php
/**
 * File name: services.php
 * Last modified: 2021.01.03 at 16:21:01
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

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

    'stripe' => [
        'model' => App\Models\User::class,
    ],

    'facebook' => [
        'client_id' => '2088483311467392',         // Your Facebook Client ID
        'client_secret' => '4fb7bff52d8eb13041f6fc59030e4b62', // Your Facebook Client Secret
        'redirect' => 'https://multi-markets.smartersvision.com/public/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '527129559488-roolg8aq110p8r1q952fqa9tm06gbloe.apps.googleusercontent.com',         // Your google Client ID
        'client_secret' => 'FpIi8SLgc69ZWodk-xHaOrxn', // Your google Client Secret
        'redirect' => 'https://multi-markets.smartersvision.com/public/login/google/callback',
    ],


    'twitter' => [
        'client_id' => '',         // Your twitter Client ID
        'client_secret' => '', // Your twitter Client Secret
        'redirect' => 'https://multi-markets.smartersvision.com/public/login/twitter/callback',
    ],

    'braintree' => [
        'model' => App\Models\User::class,
        'environment' => env('BRAINTREE_ENV'),
        'merchant_id' => env('BRAINTREE_MERCHANT_ID'),
        'public_key' => env('BRAINTREE_PUBLIC_KEY'),
        'private_key' => env('BRAINTREE_PRIVATE_KEY'),
    ],

    'razorpay' => [
        'key' => 'rzp_test_yltsH9jI7Y5gFo',
        'secret' => '9km0kMtOjh00nIHjlzaDK6Hc'
    ],

    'fcm' => [
        'key' => '',
    ]
];