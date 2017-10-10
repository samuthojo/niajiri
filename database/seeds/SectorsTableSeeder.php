<?php

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$sector = ['name' => 'Telecommunication'];
			Sector::updateOrCreate($sector, $sector);

		});
	}
}
