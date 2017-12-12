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
            'title' => 'Project positions',
        ]
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
            'name' => 'Save Project',
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
        'slug' => [
            'label' => 'Project Subdmain',
            'placeholder' => 'Project Subdomain',
            'header' => 'Project Subdomain',
            'description' => 'Subdomain name of the Project cocaCola, use camelCase no space. and can not be changed',
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
            'description' => 'Full Date when the project starts e.g 23/4/2019 etc.',
        ],
        'endedAt' => [
            'label' => 'Ends At',
            'placeholder' => 'Endend At',
            'header' => 'Ended At',
            'description' => 'Full Date when the project ends e.g 23/4/2019 etc.',
        ]
    ],
];
