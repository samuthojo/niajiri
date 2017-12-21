<?php

return [
	'genders' => [
		'Male' => 'Male',
		'Female' => 'Female',
	],
	'marital_statuses' => [
		'Single' => 'Single',
		'Widowed' => 'Widowed',
		'Divorced' => 'Divorced',
		'Separated' => 'Separated',
		'Married' => 'Married',
	],

	'messages' => [
		'basic' => 'Please fill in your basic details, to continue',
		'educations' => 'Please fill in educational details, to continue',
		'certificates' => 'Please fill in certifications details, to continue',
		'experiences' => 'Please fill in experiences details, to continue',
		'languages' => 'Please fill in languages details, to continue',
		'referees' => 'Please fill in referees details, to continue',
		'cover_letter' => 'Please attach your cover letter to continue',
		'applied' => 'You have alredy applied to this position',
	],

	'headers' => [
		'actions' => 'Actions',

		'basic_details' => [
			'name' => 'Personal Details',
			'title' => 'Personal Details',
		],

		'basic' => [
			'name' => 'Basic',
			'title' => 'Personal Details',
		],

		'educations' => [
			'name' => 'Education',
			'title' => 'Education',
		],

		'certificates' => [
			'name' => 'Certifications',
			'title' => 'Certifications Details',
		],

		'experiences' => [
			'name' => 'Field Attachment/Intern/Working',
			'title' => 'Field Attachment/Intern/Working',
		],

		'referees' => [
			'name' => 'Referees',
			'title' => 'Referees Details',
		],

		'languages' => [
			'name' => 'Languages',
			'title' => 'Communication Skills Details',
		],

		'achievements' => [
			'name' => 'Honors/Awards',
			'title' => 'Honor/Awards Details',
		],

		'projects' => [
			'name' => 'Projects',
			'title' => 'Projects Details',
		],

		'publications' => [
			'name' => 'Publications',
			'title' => 'Publications Details',
		],

		'skills_hobbies_interests' => [
			'name' => 'Skills/Personal Interests',
			'title' => 'Skills/Personal Interests',
		],

		'extra_curriculum_activities' => [
			'name' => 'Extra curriculum Activities',
			'title' => 'Extra curriculum Activities',
		],

		'cover_letter' => [
			'name' => 'Cover Letter',
			'title' => 'Cover Letter',
			'description' => 'Please attach your cover letter to continue',
		],

		'stages' => [
			'name' => 'Stages',
			'title' => 'Stages',
		],

		'generate' => [
			'name' => 'Generate',
			'title' => 'Generate CV/Resume',
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
			'name' => '&nbsp;&nbsp;Save Changes&nbsp;&nbsp;',
			'title' => 'Click To Save',
			'header' => 'New User',
			'flash' => [
				'success' => 'Details Saved Successffully',
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
	],
	'inputs' => [
		'name' => [
			'label' => 'Name',
			'placeholder' => 'e.g Juma Hamisi',
			'header' => 'Name',
			'description' => 'Full Name e.g Juma Hamisi etc.',
		],

		'first_name' => [
			'label' => 'First Name',
			'placeholder' => 'e.g Hamisi',
			'header' => 'First Name',
			'description' => 'First Name e.g Hamisi etc.',
		],

		'middle_name' => [
			'label' => 'Middle Name',
			'placeholder' => 'e.g Juma',
			'header' => 'Middle Name',
			'description' => 'Middle Name e.g Juma etc.',
		],

		'surname' => [
			'label' => 'Surname',
			'placeholder' => 'e.g Ngoda',
			'header' => 'Surname',
			'description' => 'Surname e.g Ngoda etc.',
		],

		'dob' => [
			'label' => 'Date of Birth',
			'placeholder' => 'e.g 21-06-2017',
			'header' => 'Date of Birth',
			'description' => 'Date of Birth e.g 21-06-2017',
		],

		'age' => [
			'label' => 'Age',
			'placeholder' => 'e.g 35',
			'header' => 'Age',
			'description' => 'Age e.g 35',
		],

		'gender' => [
			'label' => 'Gender',
			'placeholder' => 'Gender',
			'header' => 'Gender',
			'description' => 'Gender of the User e.g Male, Female',
		],

		'marital_status' => [
			'label' => 'Marital Status',
			'placeholder' => 'Marital Status',
			'header' => 'Marital Status',
			'description' => 'Marital Status e.g Single, Married',
		],

		'email' => [
			'label' => 'Email',
			'placeholder' => 'e.g juma.hamisi@example.com',
			'header' => 'Email',
			'description' => 'Email Address e.g e.g juma.hamisi@example.com',
		],

		'secondary_email' => [
			'label' => 'Secondary Email',
			'placeholder' => 'e.g joseph.john@example.com',
			'header' => 'Secondary Email',
			'description' => 'Secondary Email Address e.g joseph.john@example.com',
		],

		'website' => [
			'label' => 'Website/Link',
			'placeholder' => 'e.g www.example.com',
			'header' => 'Website',
			'description' => 'Website e.g www.example.com etc.',
		],

		'mobile' => [
			'label' => 'Mobile',
			'placeholder' => 'e.g 255714333999',
			'header' => 'Mobile',
			'description' => 'Mobile Phone Number e.g 255714333999 etc.',
		],

		'landline' => [
			'label' => 'Landline',
			'placeholder' => 'e.g 255222555555',
			'header' => 'Landline',
			'description' => 'Landline Phone Number e.g 255222555555 etc.',
		],

		'alternative_mobile' => [
			'label' => 'Alternative Mobile',
			'placeholder' => 'e.g 255714111111',
			'header' => 'Alternative Mobile',
			'description' => 'Alternative Mobile Phone Number e.g 255714111111 etc.',
		],

		'summary' => [
			'label' => 'About Me',
			'placeholder' => 'e.g Driven Retail Manager with over ten years’ experience in the fashion industry.',
			'header' => 'About Me',
			'description' => 'About Me e.g Driven Retail Manager with over ten years’ experience in the fashion industry. etc',
		],

		'physical_address' => [
			'label' => 'Physical Address',
			'placeholder' => 'e.g Kiusa Street etc',
			'header' => 'Physical Address',
			'description' => 'Physical Address e.g Kiusa Street etc',
		],

		'fax' => [
			'label' => 'Fax',
			'placeholder' => 'e.g 255222555555',
			'header' => 'Fax',
			'description' => 'Fax Number e.g 255222555555 etc.',
		],

		'postal_address' => [
			'label' => 'Postal Address',
			'placeholder' => 'e.g P.O.BOX 10, Ilala, Dar es salaam.',
			'header' => 'Postal Address',
			'description' => 'Postal Address e.g P.O.BOX 10, Ilala, Dar es salaam.',
		],

		'password' => [
			'label' => 'Password',
			'placeholder' => 'Password',
			'header' => 'Password',
			'description' => 'Signin Password e.g 1234 etc',
		],

		'password_confirmation' => [
			'label' => 'Confirm Password',
			'placeholder' => 'Confirm Password',
			'header' => 'Confirm Password',
			'description' => 'Confirm Signin Password e.g 1234 etc',
		],

		'avatar' => [
			'label' => 'Photo',
			'placeholder' => 'Photo',
			'header' => 'Photo',
			'description' => 'Photo',
			'change' => 'Photo',
		],

		'skills' => [
			'label' => 'Skills',
			'placeholder' => 'e.g Problem Solving, Self-Confidence',
			'header' => 'Skills',
			'description' => 'Skills e.g Problem Solving, Self-Confidence.',
		],

		'interests' => [
			'label' => 'Interests',
			'placeholder' => 'e.g Reading, Writing',
			'header' => 'Interests',
			'description' => 'Interests e.g Reading, Writing.',
		],

		'hobbies' => [
			'label' => 'Hobbies',
			'placeholder' => 'e.g Dancing, Debate',
			'header' => 'Hobbies',
			'description' => 'Hobbies e.g Dancing, Debate.',
		],

		'extracurricular_activities' => [
			'label' => 'Extracurricular Activities',
			'placeholder' => 'e.g Cycling',
			'header' => 'Extracurricular Activities',
			'description' => 'Extracurricular Activities e.g Cycling.',
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
			'header' => 'State',
			'description' => 'State',
			'change' => 'State',
		],
	],
];
