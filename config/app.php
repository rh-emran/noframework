<?php

return [
    'name' => env('APP_NAME', 'No Framework'),

    'debug' => env('APP_DEBUG', false),

    'providers' => [
        \App\Providers\AppServiceProvider::class,
        \App\Providers\RequestServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
        \App\Providers\ViewServiceProvider::class
    ],
];