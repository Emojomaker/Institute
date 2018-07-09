<?php
return [
    'permAdminPanel' => [
        'type' => 2,
        'description' => 'Admin panel',
    ],
    'user' => [
        'type' => 1,
        'description' => 'Студент',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Admin',
        'children' => [
            'user',
            'permAdminPanel',
        ],
    ],
];
