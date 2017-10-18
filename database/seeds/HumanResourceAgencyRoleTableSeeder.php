<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class HumanResourceAgencyRoleTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {
			
			//TODO give specific permission
			$permissions = Permission::all();

			$administrator = Role::where('name', Role::HR_AGENCY)
				->first();

			if (is_null($administrator)) {
				$role = [
					'name' => Role::HR_AGENCY,
					'display_name' => Role::HR_AGENCY,
					'description' => 'Human Resource Agency',
					'restrict' => true,
				];

				$administrator = Role::create($role);
			}

			$administrator->detachPermissions();
			$administrator->save();
			$administrator->attachPermissions($permissions);
			$administrator->save();
		});
	}
}
