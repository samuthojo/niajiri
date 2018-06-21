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
		'clear' => [
			'name' => 'Clear',
			'title' => 'Click To Clear',
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
				'success' => 'Application Saved Successfully',
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
				'success' => 'Application Deleted Successfully',
			],
		],
		'update' => [
			'name' => 'Update',
			'title' => 'Click To Update Application',
			'header' => 'Update Application',
			'permissions' => 'Update Application Permissions',
			'flash' => [
				'success' => 'Application Updated Successfully',
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
				'success' => 'Application Advanced Successfully',
				'warning' => 'No Application Selected',
			],
		],

		'reject' => [
			'name' => 'Reject',
			'title' => 'Click To Reject Application',
			'flash' => [
				'success' => 'Application Rejected Successfully',
				'warning' => 'No Application Selected',
			],
		],

		'notify' => [
			'name' => 'Notify',
			'label' => 'Notifying Applicants',
			'title' => 'Click To Notify Applicants',
			'flash' => [
				'success' => 'Applicants Notified Successfully',
				'warning' => 'No Applicants Selected',
			],
		],

		'advance_all' => [
			'name' => 'Advance',
			'title' => 'Click To Advance Selected Applications',
			'flash' => [
				'success' => 'Applications Advanced Successfully',
			],
		],

		'reject_all' => [
			'name' => 'Reject',
			'title' => 'Click To Reject Selected Applications',
			'flash' => [
				'success' => 'Applications Rejected Successfully',
			],
		],

		'score' => [
			'name' => 'Score',
			'label' => 'Score Application',
			'title' => 'Click To Score Application',
			'flash' => [
				'success' => 'Application Score Added Successfully',
			],
		],
		'take_test' => [
			'name' => 'Take Test',
			'title' => 'Click To Take Test',
			'flash' => [
				'success' => 'Test Taken Added Successfully',
			],
		],
		'screen' => [
			'name' => 'Screen',
			'label' => 'Screening Applicants',
			'title' => 'Click To Screen Applicants',
			'flash' => [
				'success' => 'Applicants Screened Successfully',
			],
		],
		'export' => [
			'name' => 'Export',
			'title' => 'Click to Export Applicants',
			'flash' => [
				'success' => 'Applicants Exported Successfully',
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
		'message' => [
			'label' => 'Message',
			'placeholder' => 'Notification Message...',
			'header' => 'Message',
			'description' => 'Message',
		],
	],
	'filters' => [
		'levels' => [
			'id' => 'levels',
			'name' => 'Education Level',
			'title' => 'Education Levels',
		],
		'institutions' => [
			'id' => 'institutions',
			'name' => 'Institutions',
			'title' => 'Studied Institution',
		],
		'ages' => [
			'id' => 'ages',
			'name' => 'Age',
			'title' => 'Age Range',
		],
		'genders' => [
			'id' => 'genders',
			'name' => 'Gender',
			'title' => 'Gender',
		],
		'experiences' => [
			'id' => 'experiences',
			'name' => 'Work Experiences',
			'title' => 'Work Experiences',
			'description' => 'Has Work Experiences',
		],
		'achievements' => [
			'id' => 'achievements',
			'name' => 'Honors/Awards',
			'title' => 'Honors/Awards',
			'description' => 'Has Honors/Awards',
		],
	],
];
