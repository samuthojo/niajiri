<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    //social auth services
    'facebook' => [
        'client_id' => '1282147305197748',
        'client_secret' => 'd1c48ff66e668aec8e380a69842a9a53',
        'url' => '/auth/social/provider/facebook',
        'redirect' => '/auth/social/callback/facebook',
    ],

    'google' => [
        'client_id' => '928507796206-fuuef8epqdh0ni69h5vjahvd9j1pkqaj.apps.googleusercontent.com',
        'client_secret' => 'lLoh8MT_EEZyJtgq31AJgIc7',
        'url' => '/auth/social/provider/google',
        'redirect' => '/auth/social/callback/google',
    ],

    'twitter' => [
        'client_id' => 'G1eOPWxzTZfauIFNvFlqRoKat',
        'client_secret' => 'ogei7189KNzggu1KGp8ocgCbGvTQGk5LGSOl8OrsxiMMX1NZfo',
        'url' => '/auth/social/provider/twitter',
        'redirect' => '/auth/social/callback/twitter',
    ],

    'yahoo' => [
        'client_id' => 'dj0yJmk9MjAzNWJNOWlNRU1hJmQ9WVdrOWQxSm9lV00zTlRJbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD02Mg--',
        'client_secret' => '357bb728ced477897c7b4495c11fbba738992948',
        'url' => '/auth/social/provider/yahoo',
        'redirect' => '/auth/social/callback/yahoo',
    ],

    'linkedin' => [
        'client_id' => '78z3qqp5we2hbh',
        'client_secret' => 'B06LFDl6Q40h7fow',
        'url' => '/auth/social/provider/linkedin',
        'redirect' => '/auth/social/callback/linkedin',
    ],

];
