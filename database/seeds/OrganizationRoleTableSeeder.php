<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class OrganizationRoleTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$permissions = [];
			$resources = [
	           'achievement', 'application', 'applicationstage',
	           'assignment', 'certificate',
	           'education', 'experience', 'language',
	           'media', 'position', 'publication',
	           'referee'
	        ];
      $actions = [
          'list', 'view', 'create', 'edit',
          'delete', 'export', 'import',
          'search',
      ];
      foreach ($resources as $resource) {
          foreach ($actions as $action) {
              $unspaced_resource = str_replace(' ', '', $resource);
              array_push($permissions, $action . ':' . $unspaced_resource);
          }
      };
      
      $project_actions = [
        'list', 'view', 'export', 'import',
        'search',
      ];
      foreach ($project_actions as $action) {
          array_push($permissions, $action . ':' . 'project');
      }

			$permissions = Permission::whereIn('name', $permissions)->get();

			$organization = Role::where('name', Role::ORGANIZATION)
				->first();

			if (is_null($organization)) {
				$role = [
					'name' => Role::ORGANIZATION,
					'display_name' => Role::ORGANIZATION,
					'description' => 'Organization',
					'restrict' => true,
				];

				$organization = Role::create($role);
			}

			$organization->detachPermissions();
			$organization->save();
			$organization->attachPermissions($permissions);
			$organization->save();
		});
	}
}
