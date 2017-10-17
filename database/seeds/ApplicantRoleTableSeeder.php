<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ApplicantRoleTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {
			$permissions = [];
			$resources = [
	           'achievement', 'application', 'applicationstage', 
	           'assignment', 'certificate',
	           'education', 'experience', 'language',
	           'media', 'publication', 'referee'
	        ];
	        $actions = [
	            'list', 'view', 'create', 'edit',
	            'delete', 'search',
	        ];
	        foreach ($resources as $resource) {
	            foreach ($actions as $action) {
	                $unspaced_resource = str_replace(' ', '', $resource);
	                array_push($permissions, $action . ':' . $unspaced_resource);
	            }
	        }
			$permissions = Permission::whereIn('name', $permissions)->get();

			$applicant = Role::where('name', Role::APPLICANT)
				->first();

			if (is_null($applicant)) {
				$role = [
					'name' => Role::APPLICANT,
					'display_name' => Role::APPLICANT,
					'description' => 'Applicant or Candidate',
					'restrict' => true,
				];

				$applicant = Role::create($role);
			}

			$applicant->detachPermissions();
			$applicant->save();
			$applicant->attachPermissions($permissions);
			$applicant->save();
		});
	}
}
