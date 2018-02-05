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
            'title' => 'Click To Edit Honor/Award',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Honor/Award',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Honor/Award',
            'header' => 'New Honor/Award',
            'flash' => [
                'success' => 'Honor/Award Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Honor/Award',
            'title' => 'Click To Add New Honor/Award',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Honor/Award',
            'flash' => [
                'success' => 'Honor/Award Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Honor/Award',
            'header' => 'Update Honor/Award',
            'permissions' => 'Update Honor/Award Permissions',
            'flash' => [
                'success' => 'Honor/Award Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Honors/Awards',
            'placeholder' => 'Search Honors/Awards',
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'e.g Best Employee of the Year',
            'header' => 'Title',
            'description' => 'Title of the Honor/Award e.g Best Employee of the Year etc.',
        ],
        'organization' => [
            'label' => 'Institution',
            'placeholder' => 'e.g Niajiri',
            'header' => 'Institution',
            'description' => 'Institution e.g Niajiri etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'e.g I worked hard',
            'header' => 'Summary',
            'description' => 'Brief Summary',
        ],
        'issued_at' => [
            'label' => 'Date Issued',
            'placeholder' => 'e.g 11-2015',
            'header' => 'Date Issued',
            'description' => 'Date Issued e.g 11-2015 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
        'attachment' => [
            'label' => 'Attachment',
            'placeholder' => 'Honor/Award Attachment',
            'header' => 'Attachment',
            'description' => 'Honor/Award Attachment',
            'change' => 'Attachment',
        ],
    ],
    'empty_state' => [
        'resume' => 'This candidate has not added Honors'
    ]
];
