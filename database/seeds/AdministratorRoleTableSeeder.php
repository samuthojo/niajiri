<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdministratorRoleTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {
			$permissions = Permission::all();

			$administrator = Role::where('name', Role::ADMINISTRATOR)
				->first();

			if (is_null($administrator)) {
				$role = [
					'name' => Role::ADMINISTRATOR,
					'display_name' => Role::ADMINISTRATOR,
					'description' => 'Overall System Administrator',
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
