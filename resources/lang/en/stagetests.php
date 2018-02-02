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
			'name' => 'Save Changes',
			'title' => 'Click To Save New Stage Test',
			'header' => 'New Stage Test',
			'flash' => [
				'success' => 'Stage Test Saved Succeffully',
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
	],
];
