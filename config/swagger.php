<?php

return [
    'swagger' => '2.0',
    'info' => [
        'title' => 'API Documentation',
        'description' => 'API information and description',
        'version' => '1.0.0',
    ],
    'host' => env('APP_URL', 'localhost'),
    'basePath' => '/',
    'schemes' => [
        'http',
    ],
    'consumes' => [
        'application/json',
    ],
    'produces' => [
        'application/json',
    ],
];
