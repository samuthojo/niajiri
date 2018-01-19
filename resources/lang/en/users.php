<?php

return [
	'genders' => [
		'Male' => 'Male',
		'Female' => 'Female',
	],
	'headers' => [
		'actions' => 'Actions',
	],
	'tabs' => [
		'basic_details' => [
			'name' => 'Basic Details',
			'title' => 'Basic User Details',
		],
		'change_password' => [
			'name' => 'Change Password',
			'title' => 'Change User Password',
		],
	],
	'events' => [
		'registered' => [
			'flash' => [
				'success' => 'Thank you for successfully creating an account with Niajiri platform. Please check your email to verify your account and to proceed with your application.',
				'error' => 'Whoops! Something went wrong. Your account with Niajiri could not be created.',
			],
		],
	],
	'actions' => [
		'cancel' => [
			'name' => 'Cancel',
			'title' => 'Click To Cancel',
		],
		'edit' => [
			'name' => 'Edit',
			'title' => 'Click To Edit User',
		],
		'view' => [
			'name' => 'View',
			'title' => 'Click To View User',
		],
		'save' => [
			'name' => 'Save',
			'title' => 'Click To Save New User',
			'header' => 'New User',
			'flash' => [
				'success' => 'User Saved Successffully',
			],
		],
		'create' => [
			'name' => 'New User',
			'title' => 'Click To Add New User',
		],
		'delete' => [
			'name' => 'Delete',
			'title' => 'Click To Delete User',
			'flash' => [
				'success' => 'User Deleted Successffully',
			],
		],
		'update' => [
			'name' => 'Update',
			'title' => 'Click To Update User',
			'header' => 'Update User',
			'flash' => [
				'success' => 'User Updated Successffully',
			],
		],
		'change_password' => [
			'name' => 'Change',
			'title' => 'Click To Change User Password',
			'header' => 'Change User Password',
			'flash' => [
				'success' => 'User Password Changed Successffully',
			],
		],
		'search' => [
			'name' => 'Search',
			'title' => 'Search Users',
			'placeholder' => 'Search Users',
		],
		'export' => [
			'name' => 'Export',
			'title' => 'Click to Export Users',
			'flash' => [
				'success' => 'Users Exported Succeffully',
			],
		],
	],
	'inputs' => [
		'name' => [
			'label' => 'Name',
			'placeholder' => 'Name',
			'header' => 'Name',
			'description' => 'Full Name of the User e.g Juma Hamisi etc.',
		],

		'first_name' => [
			'label' => 'First Name',
			'placeholder' => 'First Name',
			'header' => 'First Name',
			'description' => 'First Name of the User e.g Hamisi etc.',
		],

		'middle_name' => [
			'label' => 'Middle Name',
			'placeholder' => 'Middle Name',
			'header' => 'Middle Name',
			'description' => 'Middle Name of the User e.g Juma etc.',
		],

		'surname' => [
			'label' => 'Surname',
			'placeholder' => 'Surname',
			'header' => 'Surname',
			'description' => 'Surname of the User e.g Ngoda etc.',
		],

		'email' => [
			'label' => 'Email',
			'placeholder' => 'Email',
			'header' => 'Email',
			'description' => 'Email Address of the User e.g user@example.com etc.',
		],

		'secondary_email' => [
			'label' => 'Secondary Email',
			'placeholder' => 'Secondary Email',
			'header' => 'Secondary Email',
			'description' => 'Secondary Email Address of the User e.g user@example.com etc.',
		],

		'mobile' => [
			'label' => 'Mobile',
			'placeholder' => 'Mobile',
			'header' => 'Mobile',
			'description' => 'Mobile Phone Number of the User e.g 255714111111 etc.',
		],

		'landline' => [
			'label' => 'Landline',
			'placeholder' => 'Landline',
			'header' => 'Landline',
			'description' => 'Landline Phone Number of the User e.g 255222555555 etc.',
		],

		'alternative_mobile' => [
			'label' => 'Alternative Mobile',
			'placeholder' => 'Alternative Mobile',
			'header' => 'Alternative Mobile',
			'description' => 'Alternative Mobile Number of the User e.g 255714111111 etc.',
		],

		'fax' => [
			'label' => 'Fax',
			'placeholder' => 'Fax',
			'header' => 'Fax',
			'description' => 'Fax Number of the User e.g 255222555555 etc.',
		],

		'physical_address' => [
			'label' => 'Physical Address',
			'placeholder' => 'Physical Address',
			'header' => 'Physical Address',
			'description' => 'Physical Address of the User e.g Opposite TTU Office.',
		],

		'postal_address' => [
			'label' => 'Postal Address',
			'placeholder' => 'Postal Address',
			'header' => 'Postal Address',
			'description' => 'Postal Address of the User e.g P.O.BOX 10, Ilala, Dar es salaam.',
		],

		'gender' => [
			'label' => 'Gender',
			'placeholder' => 'Gender',
			'header' => 'Gender',
			'description' => 'Gender of the User e.g Male, Female',
		],

		'dob' => [
			'label' => 'Date of Birth',
			'placeholder' => 'Date of Birth',
			'header' => 'Date of Birth',
			'description' => 'Date of Birth of the User e.g 21-06-2017',
		],

		'age' => [
			'label' => 'Age',
			'placeholder' => 'Age',
			'header' => 'Age',
			'description' => 'Age of the User e.g 21-06-2017',
		],

		'password' => [
			'label' => 'Password',
			'placeholder' => 'Password',
			'header' => 'Password',
			'description' => 'User Login Password e.g 1234 etc',
		],

		'password_confirmation' => [
			'label' => 'Confirm Password',
			'placeholder' => 'Confirm Password',
			'header' => 'Confirm Password',
			'description' => 'Confirm User Login Password e.g 1234 etc',
		],

		'roles' => [
			'label' => 'Roles',
			'placeholder' => 'Roles',
			'header' => 'Roles',
			'description' => 'User Roles e.g Administrator etc',
		],

		'avatar' => [
			'label' => 'Avatar',
			'placeholder' => 'User Avatar',
			'header' => 'Avatar',
			'description' => 'User Avatar',
			'change' => 'Change Avatar',
		],

		'country' => [
			'label' => 'Country',
			'placeholder' => 'Country',
			'header' => 'Country',
			'description' => 'Country',
			'change' => 'Country',
		],

		'state' => [
			'label' => 'State/Region/City',
			'placeholder' => 'State',
			'header' => 'State/Region/City',
			'description' => 'State',
			'change' => 'State',
		],

		'applied' => [
			'label' => 'Has Applied',
			'placeholder' => 'Has Applied',
			'header' => 'Has Applied',
			'description' => 'Has Applied',
			'na' => 'N/A',
			'yes' => 'YES',
			'no' => 'NO',
		],
	],
];
