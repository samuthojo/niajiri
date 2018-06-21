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
          'slug' => 'vodaredhire',
          'summary' => 'This is a plan which comprises of bundles and PAY AS YOU GO tariffs.The bundles are rich in all net minutes, data, SMS and International minutes.When buying the bundle, a customer has the option to activate AUTO RENEWAL or ONCE OFF option.',
					'organization_id' => $organization->id,
					'startedAt' => '05-05-2017',
					'endedAt' => '31-8-2018',
				]);

		});
	}
}
