<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
	public function run() {
		$this->call(AdministratorRoleTableSeeder::class);
	}
}
