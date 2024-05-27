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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'facebook' => [
        'client_id' => '368869282843595',  //client face của bạn
        'client_secret' => '76eae60ef0c32ec522cbccbbfd778fdd',  //client app service face của bạn
        'redirect' => 'http://localhost:8080/ITShop/admin/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '512461957856-ikcc2sm9u8e0h5fm7u7e11niu36sg6vu.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8080/ITShop/google/callback',
    ],
    

];
