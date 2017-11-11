<?php

return [
    'sectors' => [
      'Telecomunication' => 'Telecomunication',
      'Software Engineering/Development'  => 'Software Engineering/Development',
      'Human Resources' => 'Human Resources'
    ],
    'genders' => [
        'Male' => 'Male',
        'Female' => 'Female',
    ],
    'headers' => [
        'actions' => 'Actions',
    ],
    'tabs' => [
        'basic_details' => [
            'name' => 'Basic Details',
            'title' => 'Basic Sector Details',
        ],
        'change_password' => [
            'name' => 'Change Password',
            'title' => 'Change Sector Password',
        ],
    ],
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Sector',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Sector',
        ],
        'save' => [
            'name' => 'Save Sector',
            'title' => 'Click To Save New Sector',
            'header' => 'New Sector',
            'flash' => [
                'success' => 'Sector Saved Successffully',
            ],
        ],
        'create' => [
            'name' => 'New Sector',
            'title' => 'Click To Add New Sector',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Sector',
            'flash' => [
                'success' => 'Sector Deleted Successffully',
            ],
        ],
        'update' => [
            'name' => 'Update Sector',
            'title' => 'Click To Update Sector',
            'header' => 'Update Sector',
            'flash' => [
                'success' => 'Sector Updated Successffully',
            ],
        ],
        'change_password' => [
            'name' => 'Change',
            'title' => 'Click To Change Sector Password',
            'header' => 'Change Sector Password',
            'flash' => [
                'success' => 'Sector Password Changed Successffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Sectors',
            'placeholder' => 'Search Sectors',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Full Name of the Sector e.g Education etc.',
        ]
    ],
];
