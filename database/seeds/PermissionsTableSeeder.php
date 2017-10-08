<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    protected $permissions = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //generate resources permission
        $resources = [
           'achievement', 'assignment', 'certificate',
           'education', 'experience', 'language', 
           'organization', 'position',
           'project', 'publication', 'referee', 
           'role', 'sector', 'user'
        ];
        $actions = [
            'list', 'view', 'create', 'edit',
            'delete', 'export', 'import',
            'search',
        ];
        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $unspaced_resource = str_replace(' ', '', $resource);
                array_push($this->permissions, [
                    'resource' => title_case($resource),
                    'name' => $action . ':' . $unspaced_resource,
                    'display_name' => title_case($action . ' ' . $resource),
                    'description' => title_case($action . ' ' . $resource),
                ]);
            }
        }

        //other permissions
        $others = [
            [
                'resource' => 'Report',
                'name' => 'view:report',
                'display_name' => 'View Report',
                'description' => 'View Report',
            ]
        ];

        //merge resources permissions with other permissions
        foreach ($others as $permission) {
            array_push($this->permissions, $permission);
        }

        DB::transaction(function () {
            foreach ($this->permissions as $permission) {
                $filter = ['name' => $permission['name']];
                Permission::updateOrCreate($filter, $permission);
            }
        });

    }
}
