<?php

return [

    'connection' => env('XMLRPC_CONNECTION', 'production'),

    'live' => [
        'url' => '178.208.55.66',
        'port' => '8069',
        'database' => 'Live'
    ],

    'tambayan' => [
        'url' => '192.168.101.29',
        'port' => '8069',
        'database' => 'tambayan'
    ],

    'stage' => [
        'url' => '192.168.101.23',
        'port' => '8069',
        'database' => 'stage'
    ],

];
