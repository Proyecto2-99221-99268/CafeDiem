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

    'github' => [
    'client_id' => 'ca96ea63f7454a9b11ec',
    'client_secret' => '6b2c35eaec8f8be67e067df82b98429b1248c0e8',
    'redirect' => 'http://127.0.0.1/login/github/callback',
],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],
  'facebook' => [
    'client_id' => '1718180691809000',
    'client_secret' => 'dc92bc35d810f46fccb3a40e5e978087',
    'redirect' => 'http://node29.codenvy.io:40289/login/facebook/callback',
],
'twitter' =>[
     'client_id' => 'r73lHiEbV1JK9Fv1VtMIbDE9b',
    'client_secret' => 'ezT9VqBfzzE1pbkmpb0jvDAjkoMZkuYiwFEOUSs0SLoPzvOLcL',
    'redirect' => 'http://node29.codenvy.io:40289/login/twitter/callback',
],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
