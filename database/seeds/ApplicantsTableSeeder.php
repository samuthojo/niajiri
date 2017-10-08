<?php

use App\Models\User;
use App\Models\Education;
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
		});
	}
}
