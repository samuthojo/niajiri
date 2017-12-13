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
        'client_id' => '327590953052-ku41h57k8nus579gdj2t499e9sjc4k8f.apps.googleusercontent.com',
        'client_secret' => '1rCTBXBr4n5_6ssdVXYn0OwR',
        'url' => '/auth/social/provider/google',
        'redirect' => '/auth/social/callback/google',
    ],

    'twitter' => [
        'client_id' => 'oypfdHPUNfPPCSaQs5jTlU02x',
        'client_secret' => 'GRNC0iPkhHPyvNN1CGLqLzZ5o1smAwR0CDwsNjP2r1tG5xpEN2',
        'url' => '/auth/social/provider/twitter',
        'redirect' => '/auth/social/callback/twitter',
    ],

    'yahoo' => [
        'client_id' => 'dj0yJmk9TlhNeWViSWk0MVZuJmQ9WVdrOVNXRlJhR0Z6Tm1zbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD03NQ--',
        'client_secret' => 'bff796afe9055ef6b959686ec55d30c59312283e',
        'url' => '/auth/social/provider/yahoo',
        'redirect' => '/auth/social/callback/yahoo',
    ],

    'linkedin' => [
        'client_id' => '86n6qfvbc7ht6u',
        'client_secret' => 'hbTiZyaTGdNLF5dK',
        'url' => '/auth/social/provider/linkedin',
        'redirect' => '/auth/social/callback/linkedin',
    ],

];
