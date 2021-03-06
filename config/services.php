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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
      'client_id' => '457949274766288',
      'client_secret' => 'dfb20d76f1028124343ad8c10d01f2e5',
      'redirect' => 'https://bluepenlabs.com/projects/olympiade-sports-web/public/user/social/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'ifEHqgpIIkJTwyuXpYjgrBkCI',
        'client_secret' => 'NL75fa6EfxdE78qbK7czValJW6wsRJaqieQ4C9ElMIaky89CLN',
        'redirect' => 'https://bluepenlabs.com/projects/olympiade-sports-web/public/user/social/twitter/callback',
    ],

  'google' => [
      'client_id' => '949293573898-ufje7v1v157mo1e8rqqjjlilvotku4j1.apps.googleusercontent.com',
      'client_secret' => 'yNElY5JwKBwD_5wQOIcM1LhQ',
      'redirect' => 'https://bluepenlabs.com/projects/olympiade-sports-web/public/user/social/google/callback',
  ],

];
