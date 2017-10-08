<?php

return [
    'levels' => [
        'Primary' => 'Primary',
        'Secondary - Ordinary Level' => 'Secondary - Ordinary Level',
        'Secondary - Advance Level' => 'Secondary - Advance Level',
        'Certificate' => 'Certificate',
        'University' => 'University',
        'University' => 'University',
    ],
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
            'title' => 'Click To Edit Education',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Education',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Education',
            'header' => 'New Education',
            'flash' => [
                'success' => 'Education Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Education',
            'title' => 'Click To Add New Education',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Education',
            'confirm' => 'Confirm Delete?',
            'flash' => [
                'success' => 'Education Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Education',
            'header' => 'Update Education',
            'permissions' => 'Update Education Permissions',
            'flash' => [
                'success' => 'Education Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Educations',
            'placeholder' => 'Search Educations',
        ],
    ],
    'inputs' => [
        'level' => [
            'label' => 'Level',
            'placeholder' => 'Level',
            'header' => 'Level',
            'description' => 'Level of the Education e.g Primary etc.',
        ],
        'institution' => [
            'label' => 'Institution',
            'placeholder' => 'Institution',
            'header' => 'Institution',
            'description' => 'Issuing Institution e.g Mtakuja etc.',
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
        'finished_at' => [
            'label' => 'Date Finished',
            'placeholder' => 'Date Finished',
            'header' => 'Date Finished',
            'description' => 'Date Finished e.g 12-12-2016 etc.',
        ],
        'remark' => [
            'label' => 'Remark',
            'placeholder' => 'Remark',
            'header' => 'Remark',
            'description' => 'Division/Pass/Fail/GPA e.g 3.8',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
