<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    |
    | This holds the permission flags for a specific user.
    | Possible flags:
    | - admin
    | - adminIT
    | - inside
    | - outside
    |
    */
    'permission' => [
        // Admin IT users
        2201 => [
            'name' => 'Admin IT 1 (AV)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        882 => [
            'name' => 'Admin IT 2 (JM)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        883 => [
            'name' => 'Admin IT 3 (AS)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        884 => [
            'name' => 'Admin IT 4 (SV)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        892 => [
            'name' => 'Admin IT 5 (EL)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        1043 => [
            'name' => 'Admin IT 6 (MB)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        1083 => [
            'name' => 'Admin IT 7 (LB)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        1092 => [
            'name' => 'Admin IT 8 (FD)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        1851 => [
            'name' => 'Admin IT 9 (JB)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        2202 => [
            'name' => 'Admin IT 10 (JC)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        2382 => [
            'name' => 'Admin IT 11 (JT)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        2383 => [
            'name' => 'Admin IT 12 (JD)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        2384 => [
            'name' => 'Admin IT 13 (Jihed Merchergui)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],
        2385 => [
            'name' => 'Admin IT 14 (Nicolas Debras)',
            'flags' => ['adminIT', 'inside', 'outside'],
        ],


        // Users
        21 => [
            'name' => 'Marco Bielen',
            'flags' => ['admin'],
        ],
        2374 => [
            'name' => 'Kevin Snauwaert',
            'flags' => ['admin'],
        ],
        2377 => [
            'name' => 'Marc Van Quekelberghe',
            'flags' => ['admin'],
        ],
        2416 => [
            'name' => 'Sebastiaan Bosmans',
            'flags' => ['admin'],
        ],

        2378 => [
            'name' => 'Bert van Brabrant',
            'flags' => ['outside'],
        ],
        2396 => [
            'name' => 'Jimmy Adams',
            'flags' => ['outside'],
        ],
        2408 => [
            'name' => 'Butrint Bejtullahi',
            'flags' => ['outside'],
        ],
        2418 => [
            'name' => 'Erol Hoyer',
            'flags' => ['outside'],
        ],

        43 => [
            'name' => 'Mohamed Bengrine',
            'flags' => ['inside'],
        ],
        457 => [
            'name' => 'Bachir Buifruri',
            'flags' => ['inside'],
        ],
        903 => [
            'name' => 'Marco Vicari',
            'flags' => ['inside'],
        ],
        1936 => [
            'name' => 'François Renoirte',
            'flags' => ['inside'],
        ],
    ]

];
