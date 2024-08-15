<?php

return [
    'route' => [
        'prefix'     => 'logs',
        'namespace'  => 'YuanRun\LogViewer',
        'middleware' => [],
    ],

    'directory' => storage_path('logs'),

    'search_page_items' => 500,

    'page_items' => 30,
];
