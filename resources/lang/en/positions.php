<?php

return [
    'status' => [
        'active' => 'Open',
        'inactive' => 'Closed',
    ],
    'duration' => [
        'Full Time' => 'Active',
        'Part Time' => 'Inactive',
        'Internship' => 'Internship',
        'Contractor' => 'Contractor',
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
        'apply' => [
            'name' => 'Apply',
            'title' => 'Click To Apply',
            'flash' => [
                'success' => 'Application Created Succeffully',
            ],
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'Title',
            'header' => 'Title',
            'description' => 'Full Title of the Position e.g CocacolaHR2017 etc.',
        ],
        'duration' => [
            'label' => 'Duration',
            'placeholder' => 'Duration',
            'header' => 'Duration',
            'description' => 'Duration of the Position e.g Full-Time etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'Summary',
            'header' => 'Summary',
            'description' => 'Full Summary of the Position.',
        ],
        'responsibilities' => [
            'label' => 'Responsibilities',
            'placeholder' => 'Responsibilities',
            'header' => 'Responsibilities',
            'description' => 'Full Responsibilities of the Position.',
        ],
        'requirements' => [
            'label' => 'Requirements',
            'placeholder' => 'Requirements',
            'header' => 'Requirements',
            'description' => 'Full Requirements of the Position.',
        ],
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'Organization',
            'header' => 'Organization',
            'description' => 'Full Name of the Organization e.g Cocacola etc.',
        ],
        'project' => [
            'label' => 'Project',
            'placeholder' => 'Project',
            'header' => 'Project',
            'description' => 'Full Name of the Project e.g CocacolaHIRE2028 etc.',
        ],
        'sector' => [
            'label' => 'Sector',
            'placeholder' => 'Sector',
            'header' => 'Sector',
            'description' => 'Full Name of the Sector e.g Finance etc.',
        ],
        'dueAt' => [
            'label' => 'Due At',
            'placeholder' => 'Due At',
            'header' => 'Due At',
            'description' => 'Time when the Position expires e.g 23/4/2019',
        ],
        'publishedAt' => [
            'label' => 'Published At',
            'placeholder' => 'Endend At',
            'header' => 'Ended At',
            'description' => 'Full Date when the Position was published e.g 23/4/2019',
        ]
    ],
];
