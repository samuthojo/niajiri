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
            'title' => 'Click To Edit Achievement',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Achievement',
        ],
        'save' => [
            'name' => 'Save Changes',
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
            'placeholder' => 'e.g Best Employee of the Year',
            'header' => 'Title',
            'description' => 'Title of the Achievement e.g Best Employee of the Year etc.',
        ],
        'organization' => [
            'label' => 'Organization',
            'placeholder' => 'e.g Niajiri',
            'header' => 'Organization',
            'description' => 'Organization e.g Niajiri etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'e.g I worked hard',
            'header' => 'Summary',
            'description' => 'Brief Summary',
        ],
        'issued_at' => [
            'label' => 'Date Issued',
            'placeholder' => 'e.g 12-11-2015',
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
