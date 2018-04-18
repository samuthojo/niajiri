<?php

return [

	'institutions' => collect([
		'University of Dar es Salaam',
		'University of Dodoma' ,
		'Mzumbe University',
		'Ardhi University' ,
		'Open University' ,
		'Sokoine University' ,
		'Muhimbili University' ,
		'St. Augustine University' ,
		'Institute of Finance Management' ,
		'St. John\'s University' ,
		'Kilimanjaro Christian Medical University' ,
		'Moshi Cooperative University',
		'Hubert Kairuki Memorial University' ,
		'Nelson Mandela African Institute of Science and Technology',
		'Kampala International University' ,
		'Tumaini University - Iringa' ,
		'Tumaini  University - Dar es Salaam' ,
		'Institue of Accountacy Arusha' ,
		'Tanzania Institute of Accounts' ,
		'Collage of  Business  Education' ,
		'Centre for Foreign Relations' ,
		'Institute of Social Work' ,
		'Dar es Salaam University College of Education',
		'Dar es Institute of Technology' ,
		'St. Joseph College Of Information Technology',
		'Other' ,
	])->map(function($value) {
        return [
            'name' => $value,
        ];
	}),

	'qualifications' => collect([
		'Achaeology',
		'Heritage Management',
		'Fine and Performing Art' ,
		'Language' ,
		'Literature',
		'History',
		'Economics',
		'Economics and Statistics',
		'Geography and Environmental Studies',
		'Political Science and Public Administration',
		'Sociology',
		'Statistics',
		'Education' ,
		'Journalism',
		'Mass communication',
		'Public Relation and Advertisement',
		'Accounting',
		'Banking and Finance',
		'Finance',
		'Human Resource and Management',
		'Marketing',
		'Tourism and Hospitality Management',
		'Adult and Community Education' ,
		'Commerce' ,
		'Early Childhood Education' ,
		'Physical Education and Sport Science',
		'Psychology' ,
		'Laws',
		'Law Enforcement',
		'Civil Engineering' ,
		'Electrical Engineering' ,
		'Mechanical Engineering' ,
		'Chemical and Process Engineering',
		'Industrial Engineering',
		'Metallogy and Mineral Processing Engineering',
		'Mining Engineering' ,
		'Textile Engineering' ,
		'Textile Design and Technology',
		'Petroleum Engineering',
		'Acturial Science',
		'Acquatic Environment Science and Conservation',
		'Fisheries and Acquaculture',
		'Applied Zoology' ,
		'Botanical Science' ,
		'Chemistry' ,
		'Geology' ,
		'Engineering Geology',
		'General',
		'Microbiology',
		'Molecular Biology and Biotechnology',
		'Wildlife Science and Conservation' ,
		'Education' ,
		'Petroleum Geology',
		'Petroleum Chemistry',
		'Meteorology',
		'Arts',
		'Science',
		'Computer Science',
		'Computer Engineering and Information Technology',
		'Electronic Science and Communication',
		'Telecommunication Engineering',
		'Beekeeping Science and Technology',
		'Agriculture Engineering and Mechanization' ,
		'food Science and Technology' ,
		'Agriculture and Natural Resources Economic and Business' ,
		'Medicine' ,
		'Arts in Library Information Studies' ,
		'Law' ,
		'Philosophy' ,
		'Business' ,
		'Management' ,
		'Science and Information Technology and Systems' ,
		'Production and Operation Management',
		'Information Technology' ,
		'Applied Statistics' ,
		'Science and Economics',
		'Economic Policy and Planning',
		'Project Planning Mangement' ,
		'Arts in Education Degree Program',
		'Economic and Project Planning Management',
		'Economic and Economic Policy and  Planning' ,
		'Economic and Population and Development' ,
		'Education and Economics and Mathematics' ,
		'Human Resource Management' ,
		'Public Administration' ,
		'Public Administratio and Records and Archives Management',
		'Local Government Management' ,
		'Health Systems Management' ,
		'Health Systems Management',
		'Human Resources',
		'Local Government Management' ,
		'Health Monitoring and Evaluation' ,
		'Accounting and Finance in Business' ,
		'Accounting and Finance in Public' ,
		'Entrepreneurship Development' ,
		'Marketing Adminstration' ,
		'Procurement and Logistics Management' ,
		'MBA Cooperate Management' ,
		'Procurement and supply Chain Management' ,
		'Entrepreneurship' ,
		'Architecture' ,
		'Architecture in Interior Designing' ,
		'Architecture in Landscape Architecture' ,
		'Building Economcs' ,
		'Urban and Regional Planning' ,
		'Housing and Infrastructure Planning' ,
		'Land Management and valuation',
		'Real Estate' ,
		'Property and Facilities Management',
		'Geomatics',
		'Information System Management' ,
		'of Environmental Science Management' ,
		'Municipal and Industrial Services Engineering' ,
		'M Housing',
		'Medical Laboratory Sciences',
		'Haematology and Blood Transfusion' ,
		'Parasitology and Medical Entomology',
		'Clinical Chemistry' ,
		'Histotechnology' ,
		'Science Radiation Therapy Technology ( RTT)' ,
		'Dental Surgery' ,
		'Pharmacy',
		'Nursing Degree Programme',
		'Midwifery Degree Programme' ,
		'(Environmental Health Science) Degree Programme' ,
		'Pharm Industrial Pharmacy' ,
		'Pharm Quality control and quality assurance' ,
		'Pharm Hospital and Clinical pharmacy' ,
		'Dent Community Dentistry' ,
		'Dent Oral Surgery' ,
		'Dent Restorative Dentistry' ,
		'Anatomy' ,
		'Cardiology' ,
		'Haematology and Blood Transfusion',
		'Rural Development' ,
		'Agricultural Economics and Agribusiness' ,
		'Agriculture General' ,
		'Agronomy' ,
		'Animal Science' ,
		'Bioprocess and Post-Harvest Engineering',
		'Biotechnology and Laboratory Science',
		'Family and Consumer Studies' ,
		'Food Science and Technology' ,
		'Horticulture',
		'Human Nutrition' ,
		'Irrigation and Water Resources Engineering',
		'Range Management',
		'Veterinary Medicine' ,
		'Tropical Animal Health and Production' ,
		'Applied Cell Biology' ,
		'Preventive Veterinary Medicine' ,
		'Applied Toxicology' ,
		'Agroforestry' ,
		'Biochemistry' ,
		'Forest Products and Technology' ,
		'Ecosystems Science and Management' ,
		'Parasitology' ,
		'Epidemiology',
		'Comparative Animal Physiology' ,
		'Crop Science' ,
		'Irrigation Engineering and Management',
		'Agricultural Statistics' ,
		'Agricultural Economics',
		'Achaeology' ,
		'Heritage Management',
	])->map(function($value){
		return [
			'name' => $value
		];
	})
	

];