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
            'title' => 'Click To Edit Certificate',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Certificate',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Certificate',
            'header' => 'New Certificate',
            'flash' => [
                'success' => 'Certificate Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Certificate',
            'title' => 'Click To Add New Certificate',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Certificate',
            'flash' => [
                'success' => 'Certificate Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Certificate',
            'header' => 'Update Certificate',
            'permissions' => 'Update Certificate Permissions',
            'flash' => [
                'success' => 'Certificate Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Certificates',
            'placeholder' => 'Search Certificates',
        ],
    ],
    'inputs' => [
        'title' => [
            'label' => 'Title/Name',
            'placeholder' => 'e.g CCNA, CPA',
            'header' => 'Title',
            'description' => 'Title of the Certificate e.g CCNA,CPA etc.',
        ],
        'institution' => [
            'label' => 'Institution',
            'placeholder' => 'e.g UCC, Cisco',
            'header' => 'Institution',
            'description' => 'Issuing Institution e.g UCC etc.',
        ],
        'summary' => [
            'label' => 'Summary',
            'placeholder' => 'e.g Pass',
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
        'expired_at' => [
            'label' => 'Date Expired',
            'placeholder' => 'e.g 12-11-2019',
            'header' => 'Date Expired',
            'description' => 'Date Expired e.g 12-11-2019 etc.',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'Applicant',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],
        'attachment' => [
            'label' => 'Attachment',
            'placeholder' => 'Certificate Attachment',
            'header' => 'Attachment',
            'description' => 'Certificate Attachment',
            'change' => 'Attachment',
        ],
    ],
];
