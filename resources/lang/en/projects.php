<?php

return [
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
            'title' => 'Basic Project Details',
        ],
        'change_password' => [
            'name' => 'Change Password',
            'title' => 'Change Project Password',
        ],
    ],
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Project',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Project',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Project',
            'header' => 'New Project',
            'flash' => [
                'success' => 'Project Saved Successffully',
            ],
        ],
        'create' => [
            'name' => 'New Project',
            'title' => 'Click To Add New Project',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Project',
            'flash' => [
                'success' => 'Project Deleted Successffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Project',
            'header' => 'Update Project',
            'flash' => [
                'success' => 'Project Updated Successffully',
            ],
        ],
        'change_password' => [
            'name' => 'Change',
            'title' => 'Click To Change Project Password',
            'header' => 'Change Project Password',
            'flash' => [
                'success' => 'Project Password Changed Successffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Projects',
            'placeholder' => 'Search Projects',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Full Name of the Project e.g CocacolaHR2017 etc.',
        ],
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'Organization',
            'header' => 'Organization',
            'description' => 'Full Name of the Organization e.g Cocacola etc.',
        ],
        'startedAt' => [
            'label' => 'Started At',
            'placeholder' => 'Started At',
            'header' => 'Started At',
            'description' => 'Full Date when the project starts e.g 23/4/2019 etc.',
        ],
        'endedAt' => [
            'label' => 'Ended At',
            'placeholder' => 'Endend At',
            'header' => 'Ended At',
            'description' => 'Full Date when the project ends e.g 23/4/2019 etc.',
        ]
    ],
];
