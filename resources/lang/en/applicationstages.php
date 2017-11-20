<?php

return [
	'headers' => [
		'actions' => 'Actions',
	],
	'summaries' => [
		'applied' => [
			'title' => 'Applied',
			'description' => 'All Applicants',
		],
		'passed' => [
			'title' => 'Passed',
			'description' => 'Of All Applicants',
		],
		'failed' => [
			'title' => 'Failed',
			'description' => 'Of All Applicants',
		],
		'unreviewed' => [
			'title' => 'Not Reviewed',
			'description' => 'Of All Applicants',
		],
	],
	'scores' => [
		'pass' => 'PASS',
		'failed' => 'FAILED',
		'na' => 'N/A',
	],
	'actions' => [
		'cancel' => [
			'name' => 'Cancel',
			'title' => 'Click To Cancel',
		],
		'edit' => [
			'name' => 'Edit',
			'title' => 'Click To Edit Application',
		],
		'view' => [
			'name' => 'View',
			'title' => 'Click To View Application',
		],
		'save' => [
			'name' => 'Save Changes',
			'title' => 'Click To Save Changes',
			'header' => 'New Application',
			'flash' => [
				'success' => 'Application Saved Succeffully',
			],
		],
		'create' => [
			'name' => 'New Application',
			'title' => 'Click To Add New Application',
		],
		'delete' => [
			'name' => 'Delete',
			'title' => 'Click To Delete Application',
			'flash' => [
				'success' => 'Application Deleted Succeffully',
			],
		],
		'update' => [
			'name' => 'Update',
			'title' => 'Click To Update Application',
			'header' => 'Update Application',
			'permissions' => 'Update Application Permissions',
			'flash' => [
				'success' => 'Application Updated Succeffully',
			],
		],
		'search' => [
			'name' => 'Search',
			'title' => 'Search Applicants',
			'placeholder' => 'Search Applicants',
		],
		'advance' => [
			'name' => 'Advance',
			'title' => 'Click To Advance Application',
			'flash' => [
				'success' => 'Application Advanced Succeffully',
			],
		],
		'score' => [
			'name' => 'Score',
			'label' => 'Score Application',
			'title' => 'Click To Score Application',
			'flash' => [
				'success' => 'Application Score Added Succeffully',
			],
		],
		'take_test' => [
			'name' => 'Take Test',
			'title' => 'Click To Take Test',
			'flash' => [
				'success' => 'Test Taken Added Succeffully',
			],
		],
	],
	'inputs' => [
		'organization' => [
			'label' => 'Organization',
			'placeholder' => 'e.g Niajiri',
			'header' => 'Organization',
			'description' => 'Organization e.g Niajiri etc.',
		],
		'position' => [
			'label' => 'Position',
			'placeholder' => 'e.g Sales Manager',
			'header' => 'Position',
			'description' => 'Position e.g Sales Manager etc.',
		],
		'created_at' => [
			'label' => 'Date Applied',
			'placeholder' => 'e.g 12-11-2015',
			'header' => 'Date Applied',
			'description' => 'Date Applied e.g 12-11-2015 etc.',
		],
		'applicant' => [
			'label' => 'Applicant',
			'placeholder' => 'Applicant',
			'header' => 'Applicant',
			'description' => 'Applicant e.g Juma Lisu etc.',
		],
		'score' => [
			'label' => 'Score',
			'placeholder' => 'Score',
			'header' => 'Score',
			'description' => 'Score e.g 90% etc.',
		],
		'comment' => [
			'label' => 'Comment',
			'placeholder' => 'Comment',
			'header' => 'Comment',
			'description' => 'Comment',
		],
		'status' => [
			'label' => 'Status',
			'placeholder' => 'Status',
			'header' => 'Status',
			'description' => 'Status',
		],
	],
];
