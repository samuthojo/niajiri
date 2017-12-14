<?php

use App\Models\Role;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$roles = Role::where('name', Role::ORGANIZATION)->get();

			$organization = User::updateOrCreate(['email' => 'hr@vodacom.com'], [
				'type' => User::TYPE_ORGANIZATION,
				'sector' => 'Telecommunication',
				'email' => 'hr@vodacom.com',
				'name' => 'Vodacom Tanzania Limited',
				'summary' => 'Telecommunication Company',
				'mobile' => '255715789878',
				'fax' => '255715789878',
        'slug' => 'vodacom',
				'landline' => '255715789878',
				'landline' => '255715789878',
				'website' => 'https://vodacom.co.tz',
				'physical_address' => 'Kijitonyama, Dar es salaam',
				'postal_address' => 'P.O.BOX 1414, Kijitonyama, Dar es salaam',
				'password' => bcrypt('vodacom'),
				'website' => 'www.vodacom.co.tz',
				'physical_address' => 'Old Bagamoyo Road',
				'summary' => 'A highly motivated and best place to work',
				'country' => 'Tanzania',
				'state' => 'Dar es Salaam',
			]);
			$organization->detachRoles();
			$organization->save();
			$organization->attachRoles($roles);
			$organization->save();

		});
	}
}
