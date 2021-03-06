<?php

return [
	'status' => [
		'active' => 'Active',
		'inactive' => 'Inactive',
	],
	'headers' => [
		'actions' => 'Actions',
		'status' => 'Status',
	],
	'tabs' => [
		'questions' => [
			'name' => 'Tests',
			'title' => 'Question tests',
		],
	],
	'actions' => [
		'cancel' => [
			'name' => 'Cancel',
			'title' => 'Click To Cancel',
		],
		'edit' => [
			'name' => 'Edit',
			'label' => 'Edit Question',
			'title' => 'Click To Edit Question',
		],
		'view' => [
			'name' => 'View',
			'title' => 'Click To View Question',
		],
		'save' => [
			'name' => 'Save Question',
			'title' => 'Click To Save New Question',
			'header' => 'New Question',
			'flash' => [
				'success' => 'Question Saved Successffully',
			],
		],
		'create' => [
			'name' => 'New Question',
			'label' => 'New Question',
			'title' => 'Click To Add New Question',
		],
		'delete' => [
			'name' => 'Delete',
			'title' => 'Click To Delete Question',
			'prompt' => 'Are you sure you want to delete this question?',
			'flash' => [
				'success' => 'Question Deleted Successffully',
				'error' => 'Failed to delete question',
				'404' => 'Question not found',
				'taken' => 'Failed to delete. This question has already been taken in one or more tests',
			],
		],
		'update' => [
			'name' => 'Update',
			'label' => 'Edit Question',
			'title' => 'Click To Update Question',
			'header' => 'Update Question',
			'flash' => [
				'success' => 'Question Updated Successffully',
				'warning' => 'Fail to update. This question has already been taken in one or more tests',
			],
		],
		'change_password' => [
			'name' => 'Change',
			'title' => 'Click To Change Question Password',
			'header' => 'Change Question Password',
			'flash' => [
				'success' => 'Question Password Changed Successffully',
			],
		],
		'search' => [
			'name' => 'Search',
			'title' => 'Search Questions',
			'placeholder' => 'Search Questions',
		],
	],
	'inputs' => [
		'label' => [
			'label' => 'Label',
			'placeholder' => 'Label',
			'header' => 'Label',
			'description' => 'Label of the Question e.g What is A etc.',
		],
		'firstChoice' => [
			'label' => 'First Choice',
			'placeholder' => 'First Choice',
			'header' => 'First Choice',
			'description' => 'First Choice of the Question',
		],
		'secondChoice' => [
			'label' => 'Second Choice',
			'placeholder' => 'Second Choice',
			'header' => 'Second Choice',
			'description' => 'Second Choice of the Question',
		],
		'thirdChoice' => [
			'label' => 'Third Choice',
			'placeholder' => 'Third Choice',
			'header' => 'Third Choice',
			'description' => 'Full Third Choice of the Question',
		],
		'fourthChoice' => [
			'label' => 'Fourth Choice',
			'placeholder' => 'Fourth Choice',
			'header' => 'Fourth Choice',
			'description' => 'Fourth CHoice of the Question',
		],
		'fifthChoice' => [
			'label' => 'Fifth Choice',
			'placeholder' => 'Fifth Choice',
			'header' => 'Fifth Choice',
			'description' => 'Fifth Choice',
		],
		'correct' => [
			'label' => 'Correct Choice',
			'placeholder' => 'Correct Choice',
			'header' => 'Correct Choice',
			'description' => 'Correct Choice of the Question',
		],
		'weight' => [
			'label' => 'Question Weight',
			'placeholder' => 'Question Weight',
			'header' => 'Question Weight',
			'description' => 'Question Weight in Test marks',
		],
		'attachment' => [
			'label' => 'Image',
			'placeholder' => 'Question Image',
			'header' => 'Image',
			'description' => 'Question Image',
			'change' => 'Image',
		],
	],
];
