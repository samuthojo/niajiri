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
            'title' => 'Click To Edit Project',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Project',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Project',
            'header' => 'New Project',
            'flash' => [
                'success' => 'Project Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Project',
            'title' => 'Click To Add New Project',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Project',
            'flash' => [
                'success' => 'Project Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Project',
            'header' => 'Update Project',
            'permissions' => 'Update Project Permissions',
            'flash' => [
                'success' => 'Project Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Projects',
            'placeholder' => 'Search Projects',
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'e.g Web Development',
            'header' => 'Title',
            'description' => 'Title of the Project e.g Web Development etc.',
        ],
        'client' => [
            'label' => 'Client',
            'placeholder' => 'e.g Niajiri',
            'header' => 'Client',
            'description' => 'Client e.g Niajiri etc.',
        ],
        'location' => [
            'label' => 'Location',
            'placeholder' => 'e.g Dar es salaam',
            'header' => 'Location',
            'description' => 'Client e.g Dar es salaam etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'Summary',
            'header' => 'Summary',
            'description' => 'Brief Summary',
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
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
    ],
];
