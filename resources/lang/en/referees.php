<?php

return [
    'headers' => [
        'actions' => 'Actions',
    ],
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Referee',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Referee',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Referee',
            'header' => 'New Referee',
            'flash' => [
                'success' => 'Referee Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Referee',
            'title' => 'Click To Add New Referee',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Referee',
            'flash' => [
                'success' => 'Referee Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Referee',
            'header' => 'Update Referee',
            'permissions' => 'Update Referee Permissions',
            'flash' => [
                'success' => 'Referee Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Referees',
            'placeholder' => 'Search Referees',
        ],
    ],
    'empty_state' => [
        'resume' => 'This candidate has not added any referee'
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'e.g Joshua Julius',
            'header' => 'Name',
            'description' => 'Name of the Referee e.g Joshua Julius etc.',
        ],
        'title' => [
            'label' => 'Title',
            'placeholder' => 'e.g General Manager',
            'header' => 'Title',
            'description' => 'Title of the Referee e.g General Manager etc.',
        ],
        'organization' => [
            'label' => 'Organization/Company',
            'placeholder' => 'e.g Vodacom',
            'header' => 'Organization',
            'description' => 'Organization e.g Vodacom etc.',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'e.g joshua.julius@vodacom.com',
            'header' => 'Email',
            'description' => 'Referee Email e.g joshua.julius@vodacom.com etc.',
        ],
        'mobile' => [
            'label' => 'Mobile',
            'placeholder' => 'e.g 255714333999',
            'header' => 'Mobile',
            'description' => 'Referee Mobile Number e.g 255714333999 etc.',
        ],
        'alternative_mobile' => [
            'label' => 'Alternative Mobile',
            'placeholder' => 'e.g 255754222777',
            'header' => 'Alternative Mobile',
            'description' => 'Referee Alternative Mobile Number e.g 255754222777 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
