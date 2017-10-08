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
use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$applicant = User::where('email', 'lallyelias87@gmail.com')->first();
			
			//prepare finder
			$finder = ['applicant_id'=>$applicant->id];

			//save education details
			Education::updateOrCreate($finder, [
					'level' => 'University', 
					'institution' => 'University of Dar es salaam', 
					'summary' => 'Bsc. in Computer Engineering',
	        		'started_at' => '20-08-2008', 
	        		'finished_at' => '25-09-2012',
	        		'remark' => '3.8', 
	        		'applicant_id' => $applicant->id
				]);

			//save certificate details
			Certificate::updateOrCreate($finder, [
					'title' => 'CCNA', 
					'institution' => 'Cisco Net Academy', 
					'summary' => 'Basic Networking',
			        'started_at' => '12-06-2009',
			        'finished_at' => '14-07-2010', 
			        'expired_at' => '08-06-2012',
	        		'applicant_id' => $applicant->id
				]);

			//save experience details
			Experience::updateOrCreate($finder, [
					'position' => 'Job Order - Web Master', 
					'organization' => 'Vodacom', 
					'sector' => 'Telecommunication', 
			        'started_at' => '20-08-2009', 
			        'ended_at' => '20-11-2011',
			        'summary' => 'Technical Support', 
			        'location' => 'Dar es salaam',
	        		'applicant_id' => $applicant->id
				]);

			//save language details
			foreach (['Swahili','English'] as $language) {
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
			Referee::updateOrCreate($finder, [
					'name' => 'John Doe', 
					'title' => 'Software Engineer', 
					'organization' => 'Github', 
			        'email' => 'john.doe@github.com', 
			        'mobile' => '255687999777',
	        		'applicant_id' => $applicant->id
				]);

			//save honor or awards details
			Achievement::updateOrCreate($finder, [
					'title' => 'MVP', 
					'organization' => 'Github', 
					'summary' => 'Most Valuable Contributor',
			        'issued_at' => '20-11-2013',
	        		'applicant_id' => $applicant->id
				]);

			//save project details
			Assignment::updateOrCreate($finder, [
					'title' => 'Quality Assurance', 
					'client' => 'University of Dar es salaam', 
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
