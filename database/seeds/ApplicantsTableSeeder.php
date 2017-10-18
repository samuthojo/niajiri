<?php

use App\Models\User;
use App\Models\Education;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Referee;
use App\Models\Achievement;
use App\Models\Assignment;
use App\Models\Publication;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$roles = Role::where('name', Role::APPLICANT)->get();

			$applicant = User::updateOrCreate([
						'email' => 'applicant@niajiri.com',
					],[
					'first_name' => 'Rose',
					'middle_name' => 'Isaya',
					'surname' => 'Mgonja',
					'mobile' => '255757111111',
					'email' => 'applicant@niajiri.com',
					'password' => bcrypt('applicant'),
			        'website' => 'www.example.com',
			        'physical_address' => 'Mtakuja Village',
        			'summary' => 'A highly motivated and hardworking individual, who has recently completed their A-Levels, achieving excellent grades in both Maths and Science',
        			'gender'=> 'Female',
			        'dob' => '24-10-1976',
			        'marital_status' => 'Married',
        			'skills' => 'Problem Solving, Adaptability, Collaboration, Strong Work Ethic, Time Management, Critical Thinking, Self-Confidence, Handling Pressure.',
			        'interests' => 'Air Sports, Archery, Astronomy, Baseball, Basketball',
			        'hobbies' => 'Traveling, Fishing, Hunting',
			        'country' => 'Tanzania',
			        'state' => 'Arusha'
			]);
			$applicant->detachRoles();
			$applicant->save();
			$applicant->attachRoles($roles);
			$applicant->save();

			//prepare finder
			$finder = ['applicant_id'=>$applicant->id];

			//save education details
			Education::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'level' => 'University',
				], [
					'level' => 'University',
					'institution' => 'University of Dar es salaam',
					'summary' => 'Bsc. in Computer Engineering',
	        		'started_at' => '20-08-2008',
	        		'finished_at' => '25-09-2012',
	        		'remark' => '3.8',
	        		'applicant_id' => $applicant->id
				]);

			Education::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'level' => 'A Level',
				], [
					'level' => 'A Level',
					'institution' => 'Maryan Girls Secondary School',
					'summary' => 'PCM',
	        		'started_at' => '20-02-2006',
	        		'finished_at' => '25-03-2008',
	        		'remark' => 'I.3',
	        		'applicant_id' => $applicant->id
				]);

			Education::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'level' => 'O Level',
				], [
					'level' => 'O Level',
					'institution' => 'Kifungilo Girls Secondary School',
					'summary' => 'Science',
	        		'started_at' => '20-02-2002',
	        		'finished_at' => '25-03-2005',
	        		'remark' => 'I.10',
	        		'applicant_id' => $applicant->id
				]);

			//save certificate details
			Certificate::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'title' => 'CCNA',
				], [
					'title' => 'CCNA',
					'institution' => 'Cisco Net Academy',
					'summary' => 'Basic Networking',
			        'started_at' => '12-06-2009',
			        'finished_at' => '14-07-2010',
			        'expired_at' => '08-06-2012',
	        		'applicant_id' => $applicant->id
				]);

			Certificate::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'title' => 'CPA',
				], [
					'title' => 'CPA',
					'institution' => 'NIBS - Tanzania',
					'summary' => 'Certified Accountant',
			        'started_at' => '12-06-2010',
			        'finished_at' => '14-07-2014',
			        'expired_at' => '08-06-2018',
	        		'applicant_id' => $applicant->id
				]);

			//save experience details
			Experience::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'position' => 'Job Order - Web Master'
				], [
					'position' => 'Job Order - Web Master',
					'organization' => 'Vodacom Tanzania Limited',
					'sector' => 'Telecommunication',
			        'started_at' => '20-08-2009',
			        'ended_at' => '20-11-2011',
			        'summary' => 'Technical Support',
			        'location' => 'Dar es salaam',
	        		'applicant_id' => $applicant->id
				]);

			Experience::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'position' => 'Web Master'
				], [
					'position' => 'Web Master',
					'organization' => 'Tigo Tanzania Limited',
					'sector' => 'Telecommunication',
			        'started_at' => '20-08-2011',
			        'ended_at' => '20-11-2013',
			        'summary' => 'Technical Support',
			        'location' => 'Dar es salaam',
	        		'applicant_id' => $applicant->id
				]);

			Experience::updateOrCreate([
					'applicant_id'=>$applicant->id,
					'position' => 'Web Master'
				], [
					'position' => 'Web Master',
					'organization' => 'TCU - Tanzania',
					'sector' => 'Public Education',
			        'started_at' => '20-08-2014',
			        'ended_at' => null,
			        'summary' => 'Web System Administrator',
			        'location' => 'Dar es salaam',
	        		'applicant_id' => $applicant->id
				]);

			//save language details
			foreach (['Swahili','English', 'French'] as $language) {
				Language::updateOrCreate([
						'applicant_id' => $applicant->id,
						'name' => $language
					], [
					'name' => $language,
					'fluency' => 'Proficient', 
					'applicant_id' => $applicant->id
				]);
			}

			//save referees details
			Referee::updateOrCreate([
						'applicant_id' => $applicant->id,
						'name' => 'John Doe',
					], [
					'name' => 'John Doe',
					'title' => 'Software Engineer',
					'organization' => 'Microsoft Global',
			        'email' => 'john.doe@github.com',
			        'mobile' => '255687999777',
	        		'applicant_id' => $applicant->id
				]);

			Referee::updateOrCreate([
						'applicant_id' => $applicant->id,
						'name' => 'Lisa Oray',
					], [
					'name' => 'Lisa Oray',
					'title' => 'Software Engineer',
					'organization' => 'Google Alphabet',
			        'email' => 'lisa.oray@google.com',
			        'mobile' => '255697999777',
	        		'applicant_id' => $applicant->id
				]);

			//save honor or awards details
			Achievement::updateOrCreate([
						'applicant_id' => $applicant->id,
						'title' => 'Employee of Year',
					], [
					'title' => 'Employee of Year',
					'organization' => 'Tigo Tanzania Limited',
					'summary' => 'Most Valuable Contributor',
			        'issued_at' => '20-11-2013',
	        		'applicant_id' => $applicant->id
				]);

			Achievement::updateOrCreate([
						'applicant_id' => $applicant->id,
						'title' => 'A Level - Best Student',
					], [
					'title' => 'A Level - Best Student',
					'organization' => 'NECTA - Tanzania',
					'summary' => 'Best Student',
			        'issued_at' => '20-11-2008',
	        		'applicant_id' => $applicant->id
				]);

			//save project details
			Assignment::updateOrCreate($finder, [
					'title' => 'Quality Assurance',
					'client' => 'University of Dar es salaam',
					'location' => 'Dar es salaam',
					'summary' => 'Develop Education Quality Assurance Platform',
	        		'started_at' => '20-08-2008',
	        		'finished_at' => '25-09-2012',
	        		'applicant_id' => $applicant->id
				]);

			//save publication details
			Publication::updateOrCreate($finder, [
					'title' => 'Software Testing',
					'publisher' => 'Medium',
					'summary' => 'The art of Software Testing',
	        		'published_at' => '20-08-2008',
	        		'applicant_id' => $applicant->id
				]);


		});
	}
}
