<?php

use App\Models\Stage;
use App\Models\Test;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder {
	public function run() {

		DB::transaction(function () {

			$stage = Stage::where('name', 'Aptitude test')->first();

			Test::updateOrCreate([
				'stage_id' => $stage->id,
				'category' => 'Quantitative Aptitude',
			], [
				'duration' => 180,
				'position_id' => $stage->position_id,
				'stage_id' => $stage->id,
				'category' => 'Quantitative Aptitude',
			]);

			Test::updateOrCreate([
				'stage_id' => $stage->id,
				'category' => 'Reasoning',
			], [
				'duration' => 180,
				'position_id' => $stage->position_id,
				'stage_id' => $stage->id,
				'category' => 'Reasoning',
			]);

		});

	}
}
