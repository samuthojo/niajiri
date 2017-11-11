<?php

use App\Models\User;
use App\Models\Sector;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			User::updateOrCreate(['email' => 'hr@vodacom.com'], [
					'type' => User::TYPE_ORGANIZATION,
					'sector' => 'Telecomunication',
					'email' => 'hr@vodacom.com',
					'name' => 'Vodacom',
					'summary' => 'Telecommunication Company',
					'mobile' => '255715789878',
					'fax' => '255715789878',
					'landline' => '255715789878',
					'landline' => '255715789878',
					'website' => 'https://vodacom.co.tz',
					'physical_address' => 'Kijitonyama, Dar es salaam',
					'postal_address' => 'P.O.BOX 1414, Kijitonyama, Dar es salaam',
				]);

		});
	}
}
