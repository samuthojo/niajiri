<?php

return [
    'headers' => [
        'permissions' => 'Permissions',
        'actions' => 'Actions',
    ],
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Role',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Role',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Role',
            'header' => 'New Role',
            'flash' => [
                'success' => 'Role Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Role',
            'title' => 'Click To Add New Role',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Role',
            'flash' => [
                'success' => 'Role Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Role',
            'header' => 'Update Role',
            'permissions' => 'Update Role Permissions',
            'flash' => [
                'success' => 'Role Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Roles',
            'placeholder' => 'Search Roles',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Name of the Role e.g HR etc.',
        ],
        'display_name' => [
            'label' => 'Display Name',
            'placeholder' => 'Display Name',
            'header' => 'Display Name',
            'description' => '',
        ],
        'description' => [
            'label' => 'Description',
            'placeholder' => 'Description',
            'header' => 'Description',
            'description' => 'Role Description e.g Human Resource etc.',
        ],
    ],
];
