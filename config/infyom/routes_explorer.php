<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Routes Explorer route
    |--------------------------------------------------------------------------
    |
    | Make sure, either you protect this route by overriding it with some middleware
    | or make it false in production environment
    |
    */

    'enable_explorer' => env('APP_DEBUG'),

    /*
    |--------------------------------------------------------------------------
    | Routes Explorer route
    |--------------------------------------------------------------------------
    |
    | On this url, routes explorer will be displayed
    |
    */

    'route' => '/admin/routes',

    /*
    |--------------------------------------------------------------------------
    | Routes Explorer view file name
    |--------------------------------------------------------------------------
    |
    | this view file will be used to display a view
    |
    */

    'view' => 'admin.routes',

    /*
    |--------------------------------------------------------------------------
    | Data Collectors
    |--------------------------------------------------------------------------
    |
    | Various data collectors to collect data
    |
    */

    'collections' => [

        // collect api calls count
        'api_calls_count' => true

    ]
];
