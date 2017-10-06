<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class RoleController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Role::filter($request->all())->orderBy('name', 'asc');

		//paginate query result
		$roles = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Roles',
			'route_description' => 'Role List',
			'roles' => $roles,
			'q' => $request->input('q'),
		];

		return view('roles.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//merge role unknown values
		$request->merge([
			'restrict' => false,
			'name' => $request->input('name'),
			'display_name' => $request->input('name'),
			'description' => $request->input('description', $request->input('name')),
			'permissions' => $request->input('permissions', []),
		]);

		//ensure unique role name
		$this->validate($request, [
			'name' => 'required|string|min:2|unique:roles,name',
		]);

		//obtain all role form inputs
		$body = $request->all();

		//check for description
		if (!is_set($body['description'])) {
			$body['description'] = $body['display_name'];
		}

		//create role
		$role = Role::create($body);

		//flash message
		flash(trans('roles.actions.save.flash.success'))
			->success()->important();

		//redirect to show role
		return redirect()->route('roles.show', [$role]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		// load permissions;
		$permissions = Permission::all();

		//group permissions by resource
		$permissions = $permissions->groupBy('resource');

		//load role with permissions
		$role = Role::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Role',
			'route_description' => 'Show Role',
			'role' => $role,
			'instance' => $role,
			'permissions' => $permissions,
		];

		return view('roles.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$role = Role::findOrFail($id);

		$data = [
			'route_title' => 'Edit Role',
			'route_description' => 'Edit Role',
			'role' => $role,
			'instance' => $role,
		];

		return view('roles.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//merge role unknown values
		$request->merge([
			'name' => $request->input('name'),
			'display_name' => $request->input('name'),
			'description' => $request->input('description', $request->input('name')),
			'permissions' => $request->input('permissions', []),
		]);

		//ensure unique role name
		$this->validate($request, [
			'name' => 'required|string|min:2|unique:roles,name,' . $id,
		]);

		//obtain all role form inputs
		$body = $request->all();

		//find existing role
		$role = Role::findOrFail($id);

		//sync role permissions
		if (is_set($body['permissions'])) {
			$role->perms()->sync($body['permissions']);
		}

		//update name
		if (is_set($body['name'])) {
			//prevent updating role name if is system role
			$role->name = $role->restrict ? $role->name : $body['name'];

			//update display name and description
			$role->display_name = $body['display_name'];
			$role->description = $body['display_name'];

			if (is_set($body['description'])) {
				$role->description = $body['description'];
			}
		}

		//save role
		$role->save();

		//flash message
		flash(trans('roles.actions.update.flash.success'))
			->success()->important();

		//redirect to show role
		return redirect()->route('roles.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		Role::destroy($id);

		//flash message
		flash(trans('roles.actions.delete.flash.success'))
			->success()->important();

		return redirect('roles');
	}
}
