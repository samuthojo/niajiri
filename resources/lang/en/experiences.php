<?php

return [
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Experience',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Experience',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Experience',
            'header' => 'New Experience',
            'flash' => [
                'success' => 'Experience Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Experience',
            'title' => 'Click To Add New Experience',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Experience',
            'flash' => [
                'success' => 'Experience Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Experience',
            'header' => 'Update Experience',
            'permissions' => 'Update Experience Permissions',
            'flash' => [
                'success' => 'Experience Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Experiences',
            'placeholder' => 'Search Experiences',
        ],
    ],
    'inputs' => [
        'position' => [
            'label' => 'Position',
            'placeholder' => 'Position',
            'header' => 'Position',
            'description' => 'Positione.g Accountant etc.',
        ],
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'Organization',
            'header' => 'Organization',
            'description' => 'Organization/Company e.g KPMG etc.',
        ],
        'sector' => [
            'label' => 'Sector',
            'placeholder' => 'Sector',
            'header' => 'Sector',
            'description' => 'Organization/Company Sector e.g Auditing etc.',
        ],
        'location' => [
            'label' => 'Location',
            'placeholder' => 'Location',
            'header' => 'Location',
            'description' => 'Organization/Company Location e.g Dar es salaam etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'Summary',
            'header' => 'Summary',
            'description' => 'Brief Summary',
        ],
        'started_at' => [
            'label' => 'Date Started',
            'placeholder' => 'Date Started',
            'header' => 'Date Started',
            'description' => 'Date Started e.g 12-11-2015 etc.',
        ],
        'ended_at' => [
            'label' => 'End Date',
            'placeholder' => 'End Date',
            'header' => 'End Date',
            'description' => 'End Date e.g 12-12-2016 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
