<?php

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$organization = User::where('email','hr@vodacom.com')->first();

			Project::updateOrCreate(['organization_id' => $organization->id], [
					'name' => 'Vodacom - Red Hire',
					'organization_id' => $organization->id,
					'startedAt' => '05-05-2017',
					'endedAt' => '12-12-2017',
				]);

		});
	}
}
