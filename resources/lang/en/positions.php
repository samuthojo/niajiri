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
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Position',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Position',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Position',
            'header' => 'New Position',
            'flash' => [
                'success' => 'Position Saved Successffully',
            ],
        ],
        'create' => [
            'name' => 'New Position',
            'title' => 'Click To Add New Position',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Position',
            'flash' => [
                'success' => 'Position Deleted Successffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Position',
            'header' => 'Update Position',
            'flash' => [
                'success' => 'Position Updated Successffully',
            ],
        ],
        'change_password' => [
            'name' => 'Change',
            'title' => 'Click To Change Position Password',
            'header' => 'Change Position Password',
            'flash' => [
                'success' => 'Position Password Changed Successffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Positions',
            'placeholder' => 'Search Positions',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Full Name of the Position e.g CocacolaHR2017 etc.',
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
            'description' => 'Full Date when the Position starts e.g 23/4/2019 etc.',
        ],
        'endedAt' => [
            'label' => 'Ends At',
            'placeholder' => 'Endend At',
            'header' => 'Ended At',
            'description' => 'Full Date when the Position ends e.g 23/4/2019 etc.',
        ]
    ],
];
