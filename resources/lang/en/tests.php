<?php

return [
	'status' => [
		'active' => 'Active',
		'inactive' => 'Inactive',
	],
	'categories' => [
		'Quantitative Aptitude' => 'Quantitative Aptitude',
		'Verbal' => 'Verbal',
		'Reasoning' => 'Abstract Reasoning',
		'Programming' => 'Programming',
		'Interview' => 'Interview',
		'Numerical' => 'Numerical',
	],
	'headers' => [
		'actions' => 'Actions',
		'status' => 'Status',
	],
	'tabs' => [
		'questions' => [
			'name' => 'Questions',
			'title' => 'Test Questions',
		],
	],
	'actions' => [
		'cancel' => [
			'name' => 'Cancel',
			'title' => 'Click To Cancel',
		],
		'edit' => [
			'name' => 'Edit',
			'label' => 'Edit Test',
			'title' => 'Click To Edit Test',
		],
		'view' => [
			'name' => 'View',
			'title' => 'Click To View Test',
		],
		'save' => [
			'name' => 'Save Test',
			'title' => 'Click To Save New Test',
			'header' => 'New Test',
			'flash' => [
				'success' => 'Test Saved Successffully',
			],
		],
		'create' => [
			'name' => 'New Test',
			'label' => 'New Test',
			'title' => 'Click To Add New Test',
			'flash' => [
				'success' => 'Test Created Successffully',
			],
		],
		'delete' => [
			'name' => 'Delete',
			'title' => 'Click To Delete Test',
			'flash' => [
				'success' => 'Test Deleted Successffully',
			],
		],
		'update' => [
			'name' => 'Update',
			'title' => 'Click To Update Test',
			'header' => 'Update Test',
			'flash' => [
				'success' => 'Test Updated Successffully',
			],
		],
		'change_password' => [
			'name' => 'Change',
			'title' => 'Click To Change Test Password',
			'header' => 'Change Test Password',
			'flash' => [
				'success' => 'Test Password Changed Successffully',
			],
		],
		'search' => [
			'name' => 'Search',
			'title' => 'Search Tests',
			'placeholder' => 'Search Tests',
		],
	],
	'inputs' => [
		'duration' => [
			'label' => 'Duration(mins)',
			'placeholder' => 'Duration(mins)',
			'header' => 'Duration(mins)',
			'description' => 'Duration(mins) e.g 180 etc.',
		],
		'stage' => [
			'label' => 'Stage',
			'placeholder' => 'Stage',
			'header' => 'Stage',
			'description' => 'Full Stage of the tests e.g Apptitude etc.',
		],
		'applicants' => [
			'label' => 'Applicants',
			'placeholder' => 'Applicants',
			'header' => 'Applicants',
			'description' => 'Applicants in this test e.g 20 etc.',
		],
		'testCategory' => [
			'label' => 'Test category',
			'placeholder' => 'Test category',
			'header' => 'Test category',
			'description' => 'Test category of the test e.g 20 etc.',
		],
		'category' => [
			'label' => 'Category',
			'placeholder' => 'Category',
			'header' => 'Category',
			'description' => 'Category e.g Numerical etc.',
		],
		'startedAt' => [
			'label' => 'Starts At',
			'placeholder' => 'Started At',
			'header' => 'Started At',
			'description' => 'Full Date when the Test starts e.g 23/4/2019 etc.',
		],
		'endedAt' => [
			'label' => 'Ends At',
			'placeholder' => 'Endend At',
			'header' => 'Ended At',
			'description' => 'Full Date when the Test ends e.g 23/4/2019 etc.',
		],
	],
];
