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
        'scheme' => 'https',
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
        'client_id' => '115512898824-n5jifaljirp527f1h349u0feh3do3k9q.apps.googleusercontent.com' ,
        'client_secret' => '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',
        'redirect' => 'http://localhost/google',
    ],
    'github'=>[
        'client_id' => 'b4eeff355085cae931f0',
        'client_secret' => 'c757110241490e056280ff8a956b47cddb3e590c',
        'redirect' => 'http://localhost/github',
    ],
    'linkedin'=>[
        'client_id' => '8686mo1jbkdxqs',
        'client_secret' => 'bIt4iY8SjF4722cj',
        'redirect' => 'http://localhost/linkedin',
    ],
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],
];
