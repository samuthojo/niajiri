<?php

return [
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Language',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Language',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Language',
            'header' => 'New Language',
            'flash' => [
                'success' => 'Language Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Language',
            'title' => 'Click To Add New Language',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Language',
            'flash' => [
                'success' => 'Language Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Language',
            'header' => 'Update Language',
            'permissions' => 'Update Language Permissions',
            'flash' => [
                'success' => 'Language Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Languages',
            'placeholder' => 'Search Languages',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Name of the Language e.g English etc.',
        ],
        'fluency' => [
            'label' => 'Fluency',
            'placeholder' => 'Fluency',
            'header' => 'Fluency',
            'description' => 'Fluency e.g Beginner etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
