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
            'title' => 'Click To Edit Publication',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Publication',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Publication',
            'header' => 'New Publication',
            'flash' => [
                'success' => 'Publication Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Publication',
            'title' => 'Click To Add New Publication',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Publication',
            'flash' => [
                'success' => 'Publication Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Publication',
            'header' => 'Update Publication',
            'permissions' => 'Update Publication Permissions',
            'flash' => [
                'success' => 'Publication Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Publications',
            'placeholder' => 'Search Publications',
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'e.g Self Awareness',
            'header' => 'Title',
            'description' => 'Title of the Publication e.g Self Awareness etc.',
        ],
        'publisher' => [
            'label' => 'Publisher',
            'placeholder' => 'e.g Mkuki',
            'header' => 'Publisher',
            'description' => 'Publisher e.g Mkuki etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'Summary',
            'header' => 'Summary',
            'description' => 'Brief Summary',
        ],
        'published_at' => [
            'label' => 'Date Published',
            'placeholder' => 'e.g 12-11-2015',
            'header' => 'Date Published',
            'description' => 'Date Published e.g 12-11-2015 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
