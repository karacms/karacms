<?php

return [
    [
        'title'       => 'Global',
        'permissions' => [
            'administrator' => 'Administrator',
        ],
    ],
    [

        'title'       => 'Users',
        'permissions' => [
            'users.create'      => 'Create Users',
            'users.update'      => 'Update Users',
            'users.delete'      => 'Delete Users',
            'users.view'        => 'View Users',
            'users.view_own'    => 'View Own Profile',
            'users.update_own'  => 'Update Own Profile',
            'users.delete_own'  => 'Delete Own Profile',
        ],
    ],
   
    [
        'title'       => 'Groups',
        'permissions' => [
            'groups.create'      => 'Create Groups',
            'groups.update'      => 'Update Groups',
            'groups.delete'      => 'Delete Groups',
            'groups.view'        => 'View Groups',
        ],
    ],

    [
        'title' => 'Settings',
        'permissions' => [
            'settings.update' => 'Update Settings'
        ]
    ]
];
