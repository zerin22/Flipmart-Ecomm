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
        'client_id' => '178512698208-h4sfp0pacpm89fmu2oegmla7ra1j9osf.apps.googleusercontent.com',
        'client_secret' => 'iZwWId-fOLOKkk4M3jVuKQbi',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],
    'github' => [
        'client_id' => '0f0902178dc0f87b241f',
        'client_secret' => 'bf90a8bffa4c166b377f9b14ca1726b18db7b908',
        'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],

];
