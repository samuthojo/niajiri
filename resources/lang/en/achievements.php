<?php

return [
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Achievement',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Achievement',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Achievement',
            'header' => 'New Achievement',
            'flash' => [
                'success' => 'Achievement Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Achievement',
            'title' => 'Click To Add New Achievement',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Achievement',
            'flash' => [
                'success' => 'Achievement Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Achievement',
            'header' => 'Update Achievement',
            'permissions' => 'Update Achievement Permissions',
            'flash' => [
                'success' => 'Achievement Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Achievements',
            'placeholder' => 'Search Achievements',
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'Title',
            'header' => 'Title',
            'description' => 'Title of the Achievement e.g CCNA etc.',
        ],
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'Organization',
            'header' => 'Organization',
            'description' => 'Issuing Organization e.g UDSM etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'Summary',
            'header' => 'Summary',
            'description' => 'Brief Summary',
        ],
        'issued_at' => [
            'label' => 'Date Issued',
            'placeholder' => 'Date Issued',
            'header' => 'Date Issued',
            'description' => 'Date Issued e.g 12-11-2015 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
