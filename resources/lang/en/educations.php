<?php

return [
    'levels' => [
        'Certificate' => 'Certificate',
        'Diploma' => 'Diploma',
        'Degree' => 'Degree',
        'Masters' => 'Masters',
    ],
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
            'title' => 'Click To Edit Education Level',
        ],
        'view' => [
            'name' => 'View',
            'title' => 'Click To View Education Level',
        ],
        'save' => [
            'name' => 'Save Changes',
            'title' => 'Click To Save New Education Level',
            'header' => 'New Education Level',
            'flash' => [
                'success' => 'Education Level Saved Succeffully',
            ],
        ],
        'create' => [
            'name' => 'New Education Level',
            'title' => 'Click To Add New Education Level',
        ],
        'delete' => [
            'name' => 'Delete',
            'title' => 'Click To Delete Education Level',
            'confirm' => 'Confirm Delete?',
            'flash' => [
                'success' => 'Education Level Deleted Succeffully',
            ],
        ],
        'update' => [
            'name' => 'Update',
            'title' => 'Click To Update Education Level',
            'header' => 'Update Education Level',
            'permissions' => 'Update Education Level Permissions',
            'flash' => [
                'success' => 'Education Level Updated Succeffully',
            ],
        ],
        'search' => [
            'name' => 'Search',
            'title' => 'Search Education Levels',
            'placeholder' => 'Search Education Levels',
        ],
    ],
    'inputs' => [
        'level' => [
            'label' => 'Level',
            'placeholder' => 'e.g Primary',
            'header' => 'Level',
            'description' => 'Level of the Education e.g Primary etc.',
        ],
        'institution' => [
            'label' => 'School/College/University',
            'placeholder' => 'e.g Mtakuja',
            'header' => 'Institution',
            'description' => 'Issuing Institution e.g Mtakuja etc.',
        ],
        'summary' => [
            'label' => 'Certificate/Diploma/Degree',
            'placeholder' => 'e.g Primary, Bsc. in Computer Science',
            'header' => 'Qualification',
            'description' => 'Brief Qualification Details',
        ],
        'started_at' => [
            'label' => 'Date Started',
            'placeholder' => 'e.g 11-2015',
            'header' => 'Date Started',
            'description' => 'Date Started e.g 11-2015 etc.',
        ],
        'finished_at' => [
            'label' => 'Date Finished',
            'placeholder' => 'e.g 12-2016',
            'header' => 'Date Finished',
            'description' => 'Date Finished e.g 12-2016 etc.',
        ],
        'remark' => [
            'label' => 'Division/Pass/Fail/GPA',
            'placeholder' => 'e.g 3.8, Pass, Fail, Division I',
            'header' => 'Remark',
            'description' => 'e.g 3.8, Pass, Fail, Division I',
        ],
        'applicant_id' => [
            'label' => 'Applicant',
            'placeholder' => 'e.g Juma Lisu',
            'header' => 'Applicant',
            'description' => 'Applicant e.g Juma Lisu etc.',
        ],

        'attachment' => [
            'label' => 'Attachment',
            'placeholder' => 'Education Level Attachment',
            'header' => 'Attachment',
            'description' => 'Education Level Attachment',
            'change' => 'Attachment',
        ],
    ],

    'institutions' => [
        'University of Dar es Salaam' => 'University of Dar es Salaam',
        'University of Dodoma' => 'University of Dodoma',
        'Mzumbe University' => 'Mzumbe University',
        'Ardhi University' => 'Ardhi University',
        'Open University' => 'Open University',
        'Sokoine University' => 'Sokoine University',
        'Muhimbili University' => 'Muhimbili University',
        'St. Augustine University' => 'St. Augustine University',
        'Institute of Finance Management' => 'Institute of Finance Management',
        'St. John\'s University' => 'St. John\'s University',
        'Kilimanjaro Christian Medical University' => 'Kilimanjaro Christian Medical University',
        'Moshi Cooperative University' => 'Moshi Cooperative University',
        'Hubert Kairuki Memorial University' => 'Hubert Kairuki Memorial University',
        'Nelson Mandela African Institute of Science and Technology' => 'Nelson Mandela African Institute of Science and Technology',
        'Kampala International University' => 'Kampala International University',
        'Tumaini University - Iringa' => 'Tumaini University - Iringa',
        'Tumaini  University - Dar es Salaam' => 'Tumaini  University-Dar es Salaam',
        'Institue of Accountacy Arusha' => 'Institue of Accountacy Arusha',
        'Tanzania Institute of Accounts' => 'Tanzania Institute of Accounts',
        'Collage of  Business  Education' => 'Collage of  Business  Education',
        'Centre for Foreign Relations' => 'Centre for Foreign Relations',
        'Institute of Social Work' => 'Institute of Social Work',
        'Dar es Salaam University College of Education' => 'Dar es Salaam University College of Education',
        'Dar es Institute of Technology' => 'Dar es Institute of Technology',
        'St. Joseph College Of Information Technology' => 'St. Joseph College Of Information Technology',
        'Other' => 'Other'
    ],

    'qualifications' => [
        'BSc in Civil Engineering' => 'BSc in Civil Engineering',
        'BSc in Electrical Engineering' => 'BSc in Electrical Engineering',
        'BSc in Mechanical Engineering' => 'BSc in Mechanical Engineering',
        'BSc in Chemical and Process Engineering' => 'BSc in Chemical and Process Engineering',
        'BSc in Industrial Engineering' => 'BSc in Industrial Engineering',
        'BSc in Metallogy and Mineral Processing Engineering' => 'BSc in Metallogy and Mineral Processing Engineering',
        'BSc in Petroleum Engineering' => 'BSc in Petroleum Engineering',
        'BSc in Engineering Geology  BSc in Engineering Geology',
        'BSc in Computer Engineering and Information Technology' => 'BSc in Computer Engineering and Information Technology',
        'BSc in Telecommunication Engineering' => 'BSc in Telecommunication Engineering',
        'BA of Science and Information Technology and Systems' => 'BA of Science and Information Technology and Systems',
        'Diploma in Information Technology' => 'Diploma in Information Technology',
        'Masters of Science and Economics' => 'Masters of Science and Economics',
        'MSc in Economic Policy and Planning' => 'MSc in Economic Policy and Planning',
        'BSc in Economic and Project Planning Management' => 'BSc in Economic and Project Planning Management',
        'Masters in Public Administration' => 'Masters in Public Administration',
        'BBA in Entrepreneurship Development' => 'BBA in Entrepreneurship Development',
        'BBA in Marketing Adminstration' => 'BBA in Marketing Adminstration',
        'BBA in Procurement and Logistics Management' => 'BBA in Procurement and Logistics Management',
        'MBA Cooperate Management' => 'MBA Cooperate Management',
        'MSc in Procurement and supply Chain Management' => 'MSc in Procurement and supply Chain Management',
        'BA Journalism and Mass Communication' => 'BA Journalism and Mass Communication',
        'BSc in Public Relations and Marketing' => 'BSc in Public Relations and Marketing',
        'BSc Business Administration' => 'BSc Business Administration',
        'BSc of Science in procurement and Logistic Management' => 'BSc of Science in procurement and Logistic Management',
        'BA in procurement and supply' => 'BA in procurement and supply',
        'BA Accounting and Finance' => 'BA Accounting and Finance',
        'B.Sc. Food Science and Technology' => 'B.Sc. Food Science and Technology',
        'Bachelor degree in Accountancy  Bachelor degree in Accountancy',
        'Bachelor degree in  Banking and Finance' => 'Bachelor degree in  Banking and Finance',
        'Bachelor  degree in Business Administration' => 'Bachelor  degree in Business Administration',
        'Bachelor Degree in Human Resource Management' => 'Bachelor Degree in Human Resource Management',
        'Bachelor Degree in Sales and marketing' => 'Bachelor Degree in Sales and marketing',
        'Bachelor Degree Commerce in Marketing' => 'Bachelor Degree Commerce in Marketing',
        'Marketing Entrepreunership' => 'Marketing Entrepreunership',
        'Bachelor Degree International Business Administration' => 'Bachelor Degree International Business Administration',
        'Bachelor Degree Bcom Marketing' => 'Bachelor Degree Bcom Marketing',
        'Bachelor Degree  Automobile Engineer' => 'Bachelor Degree  Automobile Engineer',
        'Bachelor Degree Procurement&logistic' => 'Bachelor Degree Procurement&logistic',
        'Bachelor Degree   Procurement' => 'Bachelor Degree   Procurement',
        'Bachelor Degree Logistic &Transport' => 'Bachelor Degree Logistic &Transport',
        'Bachelor of Law' => 'Bachelor of Law',
    ],
];
