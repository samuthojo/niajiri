<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(PermissionsTableSeeder::class);
		  $this->call(RolesTableSeeder::class);
		  $this->call(UsersTableSeeder::class);

  		$environment = \App::environment();
  		$isLocal = ($environment == 'local') || ($environment == 'development')
  			|| ($environment == 'test');
  		if ($isLocal) {
  			//seed test & development data
  			// $this->call(SectorsTableSeeder::class);
  		}

    }
}
