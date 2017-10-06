<?php

return [
    'headers' => [
        'actions' => 'Actions',
    ],
    'tabs' => [
        'basic_details' => [
            'name' => 'Basic Details',
            'title' => 'Basic Organization Details',
        ],
        'change_password' => [
            'name' => 'Change Password',
            'title' => 'Change Organization Password',
        ],
    ],
    'actions' => [
        'cancel' => [
            'name' => 'Cancel',
            'title' => 'Click To Cancel',
        ],
        'edit' => [
            'name' => 'Edit',
            'title' => 'Click To Edit Organization',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Organization',
        ],
        'save' => [
            'name' => 'Save',
            'title' => 'Click To Save New Organization',
            'header' => 'New Organization',
            'flash' => [
                'success' => 'Organization Saved Successffully',
            ],
        ],
        'create' => [
            'name' => 'New Organization',
            'title' => 'Click To Add New Organization',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Organization',
            'flash' => [
                'success' => 'Organization Deleted Successffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Organization',
            'header' => 'Update Organization',
            'flash' => [
                'success' => 'Organization Updated Successffully',
            ],
        ],
        'change_password' => [
            'name' => 'Change',
            'title' => 'Click To Change Organization Password',
            'header' => 'Change Organization Password',
            'flash' => [
                'success' => 'Organization Password Changed Successffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Organizations',
            'placeholder' => 'Search Organizations',
        ],
    ],
    'inputs' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
            'header' => 'Name',
            'description' => 'Full Name of the Organization e.g Juma Hamisi etc.',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Email',
            'header' => 'Email',
            'description' => 'Email Address of the Organization e.g Organization@example.com etc.',
        ],

        'mobile' => [
            'label' => 'Mobile',
            'placeholder' => 'Mobile',
            'header' => 'Mobile',
            'description' => 'Mobile Phone Number of the Organization e.g 255714111111 etc.',
        ],

        'landline' => [
            'label' => 'Landline',
            'placeholder' => 'Landline',
            'header' => 'Landline',
            'description' => 'Landline Phone Number of the Organization e.g 255222555555 etc.',
        ],
        'website' => [
            'label' => 'Website',
            'placeholder' => 'Website',
            'header' => 'Website',
            'description' => 'Website of the Organization e.g www.cocacola.co.tz etc.',
        ],

        'fax' => [
            'label' => 'Fax',
            'placeholder' => 'Fax',
            'header' => 'Fax',
            'description' => 'Fax Number of the Organization e.g 255222555555 etc.',
        ],

        'physical_address' => [
            'label' => 'Physical Address',
            'placeholder' => 'Physical Address',
            'header' => 'Physical Address',
            'description' => 'Physical Address of the Organization e.g Opposite TTU Office.',
        ],

        'postal_address' => [
            'label' => 'Postal Address',
            'placeholder' => 'Postal Address',
            'header' => 'Postal Address',
            'description' => 'Postal Address of the Organization e.g P.O.BOX 10, Ilala, Dar es salaam.',
        ],
        'sector' => [
            'label' => 'Sector',
            'placeholder' => 'Sector',
            'header' => 'Sector',
            'description' => 'Organization Sector e.g Entartainment etc',
        ],

        'logo' => [
            'label' => 'Logo',
            'placeholder' => 'Organization Logo',
            'header' => 'Logo',
            'description' => 'Organization logo',
            'change' => 'Change Logo',
        ],
    ],
];
