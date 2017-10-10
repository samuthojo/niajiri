<?php

return [
    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],
    'headers' => [
        'actions' => 'Actions',
        'status'  => 'Status',
    ],
    'tabs' => [
        'positions' => [
            'name' => 'Positions',
            'title' => 'Test positions',
        ]
    ],
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Test',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Test',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Test',
            'header' => 'New Test',
            'flash' => [
                'success' => 'Test Saved Successffully',
            ],
        ],
        'create' => [
            'name' => 'New Test',
            'title' => 'Click To Add New Test',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Test',
            'flash' => [
                'success' => 'Test Deleted Successffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Test',
            'header' => 'Update Test',
            'flash' => [
                'success' => 'Test Updated Successffully',
            ],
        ],
        'change_password' => [
            'name' => 'Change',
            'title' => 'Click To Change Test Password',
            'header' => 'Change Test Password',
            'flash' => [
                'success' => 'Test Password Changed Successffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Tests',
            'placeholder' => 'Search Tests',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Full Name of the Test e.g CocacolaHR2017 etc.',
        ],
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'Organization',
            'header' => 'Organization',
            'description' => 'Full Name of the Organization e.g Cocacola etc.',
        ],
        'startedAt' => [
            'label' => 'Starts At',
            'placeholder' => 'Started At',
            'header' => 'Started At',
            'description' => 'Full Date when the Test starts e.g 23/4/2019 etc.',
        ],
        'endedAt' => [
            'label' => 'Ends At',
            'placeholder' => 'Endend At',
            'header' => 'Ended At',
            'description' => 'Full Date when the Test ends e.g 23/4/2019 etc.',
        ]
    ],
];
