<?php

namespace App\Http\Controllers;

use App\Mail\NewsLetters;
use App\Models\NewsLetter;
use App\Models\Application;
use App\Models\Education;
use App\Models\Role;
use App\Models\User;
use Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	
	public function index(Request $request) {
		//initialize query
		$query = User::filter($request->all())
			->with('applications')
			->orderBy('name', 'asc');

		//paginate query result
		$users = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Users',
			'route_description' => 'User List',
			'users' => $users,
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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
		$user = User::findOrFail($id);
		if($user){
			$user->delete();
		}

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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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

		return redirect()->route('users.cv', ['id' => $user->id]);
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
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
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

		//load existing institutions
		$institutions = Education::distinct()->get(['institution'])->pluck('institution', 'institution');

		$data = [
			'route_title' => $user->fullName() . ' - CV',
			'route_description' => $user->fullName() . ' - CV',
			'user' => $user,
			'instance' => $user,
			'types' => collect(['All' => 'All'])->merge(User::TYPES)->all(),
			'applicant_id' => $user->id,
			'institutions' => $institutions,
		];

		return view('users.cv.index', $data);
	}

	public function get_ineractive_cv(){
		return view('users.cv.vuecv');
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

		return redirect()->route('users.cv', ['id' => $user->id]);
	}

	/**
	 * Export users(applicant, stage and score)
	 *
	 * @return void
	 */
	public function export(Request $request) {

		//initialize query
		$query = User::filter($request->all())
			->with('applications')
			->orderBy('created_at', 'asc')
			->orderBy('name', 'asc');

		//obtain user type
		$type = $request->input('type');
		$type = !is_set($type) ? 'All' : $type;

		//prepare workbook name
		$workbook = snake_case($type) . '_user_export_' . time();

		//prepare sheet name
		$sheet = snake_case($type);

		//obtain application stages(applicant plus stage)
		$users = $query->get();

		//build workbook
		Excel::create($workbook, function ($excel) use ($users, $sheet) {

			//build sheet
			$excel->sheet($sheet, function ($sheet) use ($users) {

				//set headers
				$sheet->row(1, [
					trans('users.inputs.name.header'),
					trans('users.inputs.age.header'),
					trans('users.inputs.gender.header'),
					trans('users.inputs.mobile.header'),
					trans('users.inputs.email.header'),
					trans('users.inputs.country.header'),
					trans('users.inputs.state.header'),
					trans('users.inputs.applied.header'),
				]);

				$rowCount = 2;

				//set data to export
				foreach ($users as $item) {

					$sheet->row($rowCount, [
						display_or_na($item->fullName()),
						display_int($item->age()),
						display_or_na($item->gender),
						display_or_na($item->mobile),
						display_or_na($item->email),
						display_or_na($item->country),
						display_or_na($item->state),
						$item->type !== User::TYPE_APPLICANT ? trans('users.inputs.applied.na') : display_boolean($item->applications->count() > 0, trans('users.inputs.applied.yes'), trans('users.inputs.applied.no')),
					]);

					$rowCount++;
				}

			});

		})->export('xls');
	}

	public function prepare_newsletter(Request $request){
		$applicants = User::query()->where('type','applicant')->orWhere('type','Human Resource Agency')->get();
		$request_params = $request->all();
		$message = $request_params['message'];
		$newsletter = Newsletter::create(['message'=>$message]);
	
		if ($request->hasFile('file')) {
			//clear existing attachment
			$newsletter->clearMediaCollection('newsletters');
			//attach new attachment
			$newsletter->addMediaFromRequest('file')
				->toMediaCollection('newsletters');
		}

		$id = $newsletter->id;
		$applicants = User::query()->where('type','applicant')->orWhere('type','Human Resource Agency')->get();
		$newsletter = NewsLetter::query()->where('id',$id)->first();
		$attachment = $newsletter->attachment();
		$message = $newsletter->message;

		$this->send_newsletter($newsletter->id);

		flash(trans('Newsletter successfully sent'))
			->success()->important();

		return redirect()->route('users.index');		
	}

	public function send_newsletter($id){
		$applicants = User::query()->where('type','applicant')->orWhere('type','Human Resource Agency')->get();
		$newsletter = NewsLetter::query()->where('id',$id)->first();
		$attachment = $newsletter->attachment();
		$message = $newsletter->message;
	    // dd($attachment->getPath());
		foreach($applicants as $applicant){	
				Mail::to($applicant)->queue(new NewsLetters($applicant,$attachment,$message));
		}	
	}

}
