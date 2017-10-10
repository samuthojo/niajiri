<?php

use App\Models\Stage;
use App\Models\Position;
use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$position = Position::first();

			$stages = [
					'Screeening','Aptitude test', 'First interview', 'Second Interview',
					'Employability Training Assessment',
			];

			foreach ($stages as $key => $value) {
				Stage::updateOrCreate(['position_id' => $position->id], [
						'name' => $value,
						'position_id' => $position->id,
						'activities' => 'Review '.$key,
						'passMark' => 200,
						'number' => $key,
						'startedAt' => '05-05-2017',
						'endedAt' => '12-12-2017',
					]);
				}
		});
	}
}
