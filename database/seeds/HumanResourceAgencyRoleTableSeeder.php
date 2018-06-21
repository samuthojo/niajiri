<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class HumanResourceAgencyRoleTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {
			
			$permissions = [];
			$resources = [
	           'achievement', 'application', 'applicationstage', 
	           'assignment', 'certificate',
	           'education', 'experience', 'language',
	           'media', 'organization', 'position',
	           'project', 'publication', 'question', 
	           'referee', 'sector', 'stage', 
	           'stagetest', 'test', 'testcategory'
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
	        }
			$permissions = Permission::whereIn('name', $permissions)->get();

			$hr = Role::where('name', Role::HR_AGENCY)
				->first();

			if (is_null($hr)) {
				$role = [
					'name' => Role::HR_AGENCY,
					'display_name' => Role::HR_AGENCY,
					'description' => 'Human Resource Agency',
					'restrict' => true,
				];

				$hr = Role::create($role);
			}

			$hr->detachPermissions();
			$hr->save();
			$hr->attachPermissions($permissions);
			$hr->save();
		});
	}
}
