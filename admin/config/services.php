<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
        'client_id' => 'AQocv98ueg778tGii_iQy5iqyP-9kIRM_BFnBLdwdcoOzHKgyjMSGunJgOA1H8xuDefUnUNnQBOn8Z_9',
        'secret' => 'EH_FYC12idE_ZMxNdezar0cNyHq59FoY0igeSnfcHprHCMKiUe09AL5zr9MK9klZt5e_UhML4epUrGc0'
    ],

];
