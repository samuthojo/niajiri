<?php

use App\Models\Position;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$project = Project::first();
			$organization = User::where('email', 'hr@vodacom.com')->first();

			Position::updateOrCreate([
				'organization_id' => $organization->id,
				'project_id' => $project->id,
			], [
				'title' => 'Sales Manager',
				'summary' => 'Readable content of a page when looking at its layout. The point of using Lorem Ipsum.Readable content of a page when looking at its layout. The point of using Lorem Ipsum',
				'responsibilities' => 'Readable content of a page when looking at its layout. The point of using Lorem Ipsum.Readable content of a page when looking at its layout. The point of using Lorem Ipsum',
				'requirements' => 'Readable content of a page when looking at its layout. The point of using Lorem Ipsum.Readable content of a page when looking at its layout. The point of using Lorem Ipsum',
				'duration' => 'Full Time',
				'sector' => $organization->sector,
				'organization_id' => $organization->id,
				'project_id' => $project->id,
				'publishedAt' => '05-06-2017',
				'dueAt' => $project->endedAt,
			]);

		});
	}
}
