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
            'title' => 'Click To Edit Application',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Application',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Application',
            'header' => 'New Application',
            'flash' => [
                'success' => 'Application Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Application',
            'title' => 'Click To Add New Application',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Application',
            'flash' => [
                'success' => 'Application Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Application',
            'header' => 'Update Application',
            'permissions' => 'Update Application Permissions',
            'flash' => [
                'success' => 'Application Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Applications',
            'placeholder' => 'Search Applications',
        ]
    ],
    'inputs' => [
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'e.g Niajiri',
            'header' => 'Organization',
            'description' => 'Organization e.g Niajiri etc.',
        ],
        'position' => [
            'label' => 'Position',
            'placeholder' => 'e.g Sales Manager',
            'header' => 'Position',
            'description' => 'Position e.g Sales Manager etc.',
        ],
        'created_at' => [
            'label' => 'Date Applied',
            'placeholder' => 'e.g 12-11-2015',
            'header' => 'Date Applied',
            'description' => 'Date Applied e.g 12-11-2015 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
