<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$roles = Role::all();

			$users = [
				[
					'name' => 'Lally Elias',
					'first_name' => 'Lally',
					'surname' => 'Elias',
					'mobile' => '255714095061',
					'email' => 'lallyelias87@gmail.com',
					'password' => bcrypt('niajiri@qwerty'),
					'verified' => true
				],

				[
					'name' => 'Barnabas Makonda',
					'first_name' => 'Barnabas',
					'surname' => 'Makonda',
					'mobile' => '255688620135',
					'email' => 'barnabasmakonda@gmail.com',
					'password' => bcrypt('niajiri@qwerty'),
					'verified' => true
				],

				[
					'name' => 'Nelson Melekela',
					'first_name' => 'Nelson',
					'surname' => 'Melekela',
					'mobile' => '255717111111',
					'email' => 'nellyocs90@gmail.com',
					'password' => bcrypt('niajiri@qwerty'),
					'verified' => true
				],
			];

			foreach ($users as $user) {
				$finder = ['email' => $user['email']];
				$user = User::updateOrCreate($finder, $user);

				$user->detachRoles();
				$user->save();
				$user->attachRoles($roles);
				$user->save();
			}
		});
	}
}
