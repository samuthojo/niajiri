<?php

return [
	'headers' => [
		'actions' => 'Actions',
		'test' => 'Test',
	],
	'actions' => [
		'cancel' => [
			'name' => 'Cancel',
			'title' => 'Click To Cancel',
		],
		'edit' => [
			'name' => 'Edit',
			'title' => 'Click To Edit Stage Test',
		],
		'view' => [
			'name' => 'View',
			'title' => 'Click To View Stage Test',
		],
		'save' => [
			'name' => 'Submit',
			'title' => 'Click To Submit Test',
			'header' => 'New Stage Test',
			'flash' => [
				'success' => 'Test Submitted Succeffully',
				'warning' => 'You have already attempted the selected test.',
			],
		],
		'create' => [
			'name' => 'New Stage Test',
			'title' => 'Click To Add New Stage Test',
		],
		'delete' => [
			'name' => 'Delete',
			'title' => 'Click To Delete Stage Test',
			'confirm' => 'Confirm Delete?',
			'flash' => [
				'success' => 'Stage Test Deleted Succeffully',
			],
		],
		'update' => [
			'name' => 'Update',
			'title' => 'Click To Update Stage Test',
			'header' => 'Update Stage Test',
			'flash' => [
				'success' => 'Stage Test Updated Succeffully',
			],
		],
		'search' => [
			'name' => 'Search',
			'title' => 'Search Stage Tests',
			'placeholder' => 'Search Stage Tests',
		],
		'timeout' => [
			'name' => 'View Results',
			'header' => 'Timeout',
			'title' => 'Timeout',
			'description' => 'Time is up.',
			'brief' => 'Please, submit your test to view results.',
		],
	],
];
