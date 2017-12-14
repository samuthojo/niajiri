<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		//initialize query
		$query = User::filter($request->all())->orderBy('name', 'asc');

		//paginate query result
		$users = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Users',
			'route_description' => 'User List',
			'users' => $users,
			'q' => $request->input('q'),
		];

		return view('users.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$roles = Role::orderBy('name', 'asc')->get();

		$data = [
			'user' => new User(),
			'roles' => $roles,
		];

		return view('users.create', $data);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//merge defaults
		$request->merge([
			'verified' => true,
			'roles' => $request->input('roles', []),
			'password' => $request->input('password', config('auth.defaults.password')),
			'password_confirmation' => $request->input('password_confirmation', config('auth.defaults.password')),
		]);

		//validate user
		$this->validate($request, [
			'first_name' => 'string|min:2|max:255|required',
			'surname' => 'string|min:2|max:255|required',
			'email' => 'string|min:2|max:255|required|unique:users,mobile',
			'mobile' => 'string|min:2|max:255|required|unique:users,mobile',
			'gender' => 'string|min:2|max:255|required',
			'dob' => 'date|required',
			'password' => 'string|min:8|max:255|required|confirmed',
		]);

		//obtain user form input
		$body = $request->all();

		//encrypt password before save
		if (array_has($body, 'password')) {
			$body['password'] = bcrypt($body['password']);
		}

		//derive user name
		$body['name'] = $body['first_name'] . ' ' . $body['surname'];

		//create user
		$user = User::create($body);

		//upload & store user avatar
		if ($user && $request->hasFile('avatar')) {
			//clear existing avatar
			$user->clearMediaCollection('avatars');
			//attach new avatar
			$user->addMediaFromRequest('avatar')
				->toMediaCollection('avatars');
		}

		//sync user roles
		if (is_set($body['roles'])) {
			$user->roles()->sync($body['roles']);
		}

		$user->save();

		//flash message
		flash(trans('users.actions.save.flash.success'))
			->success()->important();

		//redirect to show user
		return redirect()->route('users.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$user = User::findOrFail($id);

		$roles = Role::orderBy('name', 'asc')->get();

		$data = [
			'route_title' => 'Show User',
			'route_description' => 'Show User',
			'user' => $user,
			'instance' => $user,
			'roles' => $roles,
		];

		return view('users.edit', $data);
	}

	/**
	 * Display form to change user password
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showChangePassword($id) {

		$user = User::findOrFail($id);

		$roles = Role::orderBy('name', 'asc')->get();

		$data = [
			'route_title' => 'Change User Password',
			'route_description' => 'Change User Password',
			'user' => $user,
			'instance' => $user,
			'roles' => $roles,
		];

		return view('users.change_password', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$user = User::findOrFail($id);

		$roles = Role::orderBy('name', 'asc')->get();

		$data = [
			'route_title' => 'Edit User',
			'route_description' => 'Edit User',
			'user' => $user,
			'instance' => $user,
			'roles' => $roles,
		];

		return view('users.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		//merge defaults
		$request->merge([
			'roles' => $request->input('roles', []),
		]);

		//validate user
		$this->validate($request, [
			'first_name' => 'string|min:2|max:255|required',
			'surname' => 'string|min:2|max:255|required',
			'email' => 'string|min:2|max:255|required|unique:users,email,' . $id,
			'mobile' => 'string|min:2|max:255|required|unique:users,mobile,' . $id,
			'gender' => 'string|min:2|max:255|required',
			'dob' => 'date|required',
		]);

		//obtain user updates from form input
		$body = $request->all();

		//find existing user
		$user = User::findOrFail($id);

		//update user
		$user->update($body);

		//sync user roles
		if (is_set($body['roles'])) {
			$user->roles()->sync($body['roles']);
		}

		//upload & store user avatar
		if ($user && $request->hasFile('avatar')) {
			//clear existing avatar
			$user->clearMediaCollection('avatars');
			//attach new avatar
			$user->addMediaFromRequest('avatar')
				->toMediaCollection('avatars');
		}

		//flash message
		flash(trans('users.actions.update.flash.success'))
			->success()->important();

		//redirect to show user
		return redirect()->route('users.index');
	}

	/**
	 * Update the user password.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function changePassword(Request $request, $id) {
		//validate user
		$this->validate($request, [
			'password' => 'string|min:8|max:255|required|confirmed',
		]);

		//obtain user password updates from form input
		$body = $request->all();

		//encrypt password before save
		$password = null;
		if (array_has($body, 'password')) {
			$password = bcrypt($body['password']);
		}

		//find existing user
		$user = User::findOrFail($id);

		//update user if password changed
		if (is_set($password)) {
			$user->update(['password' => $password]);
		}

		//flash message
		flash(trans('users.actions.change_password.flash.success'))
			->success()->important();

		//redirect to show user
		return redirect()->route('users.edit', ['id' => $user->id]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		//soft delete user
		User::findOrFail($id)->delete();

		//flash message
		flash(trans('users.actions.delete.flash.success'))
			->success()->important();

		return redirect('users');
	}

	/**
	 * Display current user profile
	 * @return \Illuminate\Http\Response
	 */
	public function profile(Request $request, $id = null) {
		//load actual current user
		$id = is_set($id) ? $id : \Auth::user()->id;
		$user = User::query()->findOrFail($id);

		//find existing user
		$user = User::findOrFail($id);

		//TODO ensure all required info per profile
		return view('pages.dashboard.index', [
			'route_title' => 'Profile',
			'route_description' => 'Profile',
			'user' => $user,
			'instance' => $user,
		]);
	}

	/**
	 * Display user profile
	 * @return \Illuminate\Http\Response
	 */
	public function userProfile(Request $request) {
		//TODO ensure all required info per profile
		return view('pages.dashboard.index', [
			'route_title' => 'Profile',
			'route_description' => 'Profile',
			'user' => \Auth::user(),
			'instance' => \Auth::user(),
		]);
	}

	/**
	 * Display current user basic details
	 * @return \Illuminate\Http\Response
	 */
	public function get_basic(Request $request) {
		//load actual current user
		$id = \Auth::user()->id;
		$user = User::findOrFail($id);

		$data = [
			'route_title' => 'Basic Details',
			'route_description' => 'Basic Details',
			'user' => $user,
			'instance' => $user,
		];

		return view('users.basic.edit', $data);
	}

	/**
	 * Update current user basic details
	 * @return \Illuminate\Http\Response
	 */
	public function post_basic(Request $request) {
		//obtain current user id
		$id = \Auth::user()->id;

		//validate user
		$this->validate($request, [
			'first_name' => 'string|min:2|max:255|required',
			'surname' => 'string|min:2|max:255|required',
			'email' => 'string|min:2|max:255|required|unique:users,email,' . $id,
			'mobile' => 'string|min:2|max:255|required|unique:users,mobile,' . $id,
			'physical_address' => 'string|min:2|max:255|required',
			'summary' => 'string|required',
			'country' => 'string|required',
			'state' => 'string|required',
			'gender' => 'string|min:2|max:255|required',
			'dob' => 'date|required',
			'marital_status' => 'string|min:2|max:255|required',
		]);

		//obtain user updates from form input
		$body = $request->all();

		//reload current user
		$user = User::findOrFail($id);

		//update user
		$user->update($body);

		//upload & store user avatar
		if ($user && $request->hasFile('avatar')) {
			//clear existing avatar
			$user->clearMediaCollection('avatars');
			//attach new avatar
			$user->addMediaFromRequest('avatar')
				->toMediaCollection('avatars');
		}

		//flash message
		flash(trans('users.actions.update.flash.success'))
			->success()->important();

		return redirect()->route('users.basic');
	}

	/**
	 * Display current user resume
	 * @return \Illuminate\Http\Response
	 */
	public function get_resume(Request $request, $id = null) {
		//load actual current user
		$id = is_set($id) ? $id : \Auth::user()->id;
		$user = User::query()->findOrFail($id);

		$application = Application::find($request->input('application_id'));

		$data = [
			'route_title' => $user->fullName() . ' - Resume',
			'route_description' => $user->fullName() . ' - Resume',
			'user' => $user,
			'application' => $application,
			'instance' => $user,
		];

		return view('users.resume.index', $data);
	}


	/**
	 * Display current user cv
	 * @return \Illuminate\Http\Response
	 */
	public function get_cv(Request $request, $id = null) {
		//load actual current user
		$id = is_set($id) ? $id : \Auth::user()->id;
		$user = User::query()->findOrFail($id);

		$application = Application::find($request->input('application_id'));

		$data = [
			'route_title' => $user->fullName() . ' - CV',
			'route_description' => $user->fullName() . ' - CV',
			'user' => $user,
			'instance' => $user,
		];

		return view('users.cv.index', $data);
	}

	/**
	 * Quick edit current user basic details(or cv details)
	 * @return \Illuminate\Http\Response
	 */
	public function post_edits(Request $request) {

		//obtain current user id
		$id = \Auth::user()->id;

		//obtain user updates from form input
		$body = $request->all();

		//reload current user
		$user = User::findOrFail($id);

		//update user
		$user->update($body);

		//upload & store user avatar
		if ($user && $request->hasFile('avatar')) {
			//clear existing avatar
			$user->clearMediaCollection('avatars');
			//attach new avatar
			$user->addMediaFromRequest('avatar')
				->toMediaCollection('avatars');
		}

		//flash message
		flash(trans('cvs.actions.save.flash.success'))
			->success()->important();

		return redirect()->route('users.cv');
	}
}
