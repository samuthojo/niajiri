<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
	public function run() {
		$this->call(AdministratorRoleTableSeeder::class);
		$this->call(ApplicantRoleTableSeeder::class);
		$this->call(HumanResourceAgencyRoleTableSeeder::class);
		$this->call(OrganizationRoleTableSeeder::class);
	}
}
