<?php

return [
    'route' => [
        'prefix'     => 'logs',
        'namespace'  => 'Yuan\LogViewer',
        'middleware' => [],
    ],

    'directory' => storage_path('logs'),

    'search_page_items' => 500,

    'page_items' => 30,
];
