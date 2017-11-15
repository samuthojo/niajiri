<?php

return [
    'headers' => [
        'actions' => 'Actions',
    ],
    'languages' => [
        'Swahili' => 'Swahili',
        'English' => 'English',
        'French' => 'French',
        'Chineese' => 'Chineese',
        'Italian' => 'Italian',
        'Spanish' => 'Spanish',
        'Hindi' => 'Hindi',
        'Portuguese' => 'Portuguese',
        'Bengali' => 'Bengali',
        'Russian' => 'Russian',
    ],
    'fluencies' => [
        'Good' => 'Good',
        'Fair' => 'Fair',
        'Excellent' => 'Excellent'
    ],
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
            'name' => 'Save Changes',
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
            'placeholder' => 'e.g English',
            'header' => 'Name',
            'description' => 'Name of the Language e.g English etc.',
        ],
        'write_fluency' => [
            'label' => 'Writting',
            'placeholder' => 'e.g Fair',
            'header' => 'Writting',
            'description' => 'Writting e.g Fair etc.',
        ],
        'speak_fluency' => [
            'label' => 'Speaking',
            'placeholder' => 'e.g Good',
            'header' => 'Speaking',
            'description' => 'Speaking e.g Good etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
