<?php

return [
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Assignment',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Assignment',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Assignment',
            'header' => 'New Assignment',
            'flash' => [
                'success' => 'Assignment Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Assignment',
            'title' => 'Click To Add New Assignment',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Assignment',
            'flash' => [
                'success' => 'Assignment Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Assignment',
            'header' => 'Update Assignment',
            'permissions' => 'Update Assignment Permissions',
            'flash' => [
                'success' => 'Assignment Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Assignments',
            'placeholder' => 'Search Assignments',
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'Title',
            'header' => 'Title',
            'description' => 'Title of the Assignment e.g CCNA etc.',
        ],
        'client' => [
            'label' => 'Client',
            'placeholder' => 'Client',
            'header' => 'Client',
            'description' => 'Client e.g Niajiri etc.',
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
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
