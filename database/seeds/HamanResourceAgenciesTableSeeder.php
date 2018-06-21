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

class HamanResourceAgenciesTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$roles = Role::where('name', Role::HR_AGENCY)->get();

			$hr = User::updateOrCreate([
						'email' => 'humanresource@niajiri.com',
					],[
					'type' => User::TYPE_HR_AGENCY,
					'first_name' => 'James',
					'middle_name' => 'Ramadbani',
					'surname' => 'Kibakaya',
					'mobile' => '255745333444',
					'email' => 'humanresource@niajiri.com',
					'password' => bcrypt('humanresource'),
			        'website' => 'www.example.com',
			        'physical_address' => 'Sokoine Street',
        			'summary' => 'A highly motivated and hardworking individual',
        			'gender'=> 'Male',
			        'dob' => '19-04-1981',
			        'marital_status' => 'Married',
        			'skills' => 'Problem Solving, Adaptability',
			        'interests' => 'Baseball, Basketball',
			        'hobbies' => 'Fishing, Hunting',
			        'country' => 'Tanzania',
			        'state' => 'Dodoma'
			]);
			$hr->detachRoles();
			$hr->save();
			$hr->attachRoles($roles);
			$hr->save();

		});
	}
}
