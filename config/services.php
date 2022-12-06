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

    'google' => [
        'client_id' => '280361745329-jtc5997bic89niogr6r3a75n3sa40m4c.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/newsportal_2.0/auth/google/callback',
    ],
    
    'facebook' => [
        'client_id' => '196002292633404',
        'client_secret' => 'ba91948c21336a0bd34d840123a771c4',
        'redirect' => 'http://localhost/newsportal_2.0/auth/facebook/callback',
    ],

];
