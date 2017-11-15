<?php

return [
    'levels' => [
        'Certificate' => 'Certificate',
        'Diploma' => 'Diploma', 
        'Degree' => 'Degree', 
        'Masters' => 'Masters'
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
            'title' => 'Click To Edit Education Level',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Education Level',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Education Level',
            'header' => 'New Education Level',
            'flash' => [
                'success' => 'Education Level Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Education Level',
            'title' => 'Click To Add New Education Level',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Education Level',
            'confirm' => 'Confirm Delete?',
            'flash' => [
                'success' => 'Education Level Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Education Level',
            'header' => 'Update Education Level',
            'permissions' => 'Update Education Level Permissions',
            'flash' => [
                'success' => 'Education Level Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Education Levels',
            'placeholder' => 'Search Education Levels',
        ],
    ],
    'inputs' => [
        'level' => [
            'label' => 'Level',
            'placeholder' => 'e.g Primary',
            'header' => 'Level',
            'description' => 'Level of the Education e.g Primary etc.',
        ],
        'institution' => [
            'label' => 'School/College/University',
            'placeholder' => 'e.g Mtakuja',
            'header' => 'Institution',
            'description' => 'Issuing Institution e.g Mtakuja etc.',
        ],
        'summary' => [
            'label' => 'Certificate/Diploma/Degree',
            'placeholder' => 'e.g Primary, Bsc. in Computer Science',
            'header' => 'Qualification',
            'description' => 'Brief Qualification Details',
        ],
        'started_at' => [
            'label' => 'Date Started',
            'placeholder' => 'e.g 12-11-2015',
            'header' => 'Date Started',
            'description' => 'Date Started e.g 12-11-2015 etc.',
        ],
        'finished_at' => [
            'label' => 'Date Finished',
            'placeholder' => 'e.g 12-12-2016',
            'header' => 'Date Finished',
            'description' => 'Date Finished e.g 12-12-2016 etc.',
        ],
        'remark' => [
            'label' => 'Division/Pass/Fail/GPA',
            'placeholder' => 'e.g 3.8, Pass, Fail, Division I',
            'header' => 'Remark',
            'description' => 'e.g 3.8, Pass, Fail, Division I',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'e.g Juma Lisu',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],

        'attachment' => [
            'label' => 'Attachment',
            'placeholder' => 'Education Level Attachment',
            'header' => 'Attachment',
            'description' => 'Education Level Attachment',
            'change' => 'Attachment',
        ],
    ],
];
