<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Portfolio Owner Settings
    |--------------------------------------------------------------------------
    */
    'owner_name' => env('PORTFOLIO_OWNER_NAME', 'Your Name'),
    'owner_title' => env('PORTFOLIO_OWNER_TITLE', 'Full Stack Developer'),
    'owner_passion' => env('PORTFOLIO_OWNER_PASSION', 'Building great things'),
    'owner_bio' => env('PORTFOLIO_OWNER_BIO', 'Passionate developer building amazing web experiences with clean code and creative solutions.'),
    'owner_skill' => array_filter(
        array_map(
            'trim',
            explode(',', env('PORTFOLIO_OWNER_SKILL', 'PHP,Laravel,Vue.js,Vanilla.js,C#,MySQL'))
        )
    ),
    'owner_avatar' => env('PORTFOLIO_OWNER_AVATAR', null),

    /*
    |--------------------------------------------------------------------------
    | Social Media Links
    |--------------------------------------------------------------------------
    */
    'social' => [
        'github' => env('SOCIAL_GITHUB', ''),
        'linkedin' => env('SOCIAL_LINKEDIN', ''),
        'twitter' => env('SOCIAL_TWITTER', ''),
        'email' => env('SOCIAL_EMAIL', ''),
        'whatsapp' => env('SOCIAL_WHATSAPP', ''),
        'instagram' => env('SOCIAL_INSTAGRAM', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO Settings
    |--------------------------------------------------------------------------
    */
    'seo' => [
        'default_title' => env('SEO_DEFAULT_TITLE', 'Dev Portfolio'),
        'default_description' => env('SEO_DEFAULT_DESCRIPTION', 'Professional Developer Portfolio & Blog'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    */
    'google_analytics_id' => env('GOOGLE_ANALYTICS_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    */
    'features' => [
        'dark_mode' => true,
        'view_counter' => true,
        'contact_form' => true,
        'blog' => true,
        'sitemap' => true,
    ],
];
