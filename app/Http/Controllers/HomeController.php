<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller {
  
	public function __construct() {
		parent::__construct();
	}

	public function index(Request $request) {

		//ensure user is authenticated
		$this->middleware('auth');

		//ensure user is verified
		$this->middleware('isVerified');
		//TODO flash unverified is user not verified
		//TODO once user register provide directions to look on the
		//email to verify account
		//TODO allow user to resend verification email
		//redirect applicant
		if (\Auth::user()->hasRole(Role::APPLICANT)) {
			return redirect()->route('users.cv');
		}

		//redirect hr agency
		else if (\Auth::user()->hasRole([Role::HR_AGENCY])) {
			return redirect()->route('organizations.index');
		}

		//redirect organization
		else if (\Auth::user()->hasRole([Role::ORGANIZATION])) {
			return redirect()->route('projects.index');
		}

		//handle normal user
		else {
			return view('pages.dashboard.index', [
				'route_title' => 'Dashboard',
				'route_description' => 'Dashboard',
			]);
		}
	}

	public function landing(Request $request) {
		return view('landing.index', ['route_title' => 'landing']);
	}

	public function minor(Request $request) {
		return view('pages.dashboard.minor', [
			'route_title' => 'Minor',
			'route_description' => 'Minor',
		]);
	}

	/**
	 * Obtain country states/region/cities
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function get_states(Request $request) {
		$countryName = $request->input('country');

		$country = collect(config('countries'))->first(function ($country) use ($countryName) {
			return $country['name'] === $countryName;
		});

		//obtain specific country states
		if ($country) {
			$states = collect(config('states'))
				->filter(function ($state) use ($country) {
					return $state['countryCode'] === $country['code'];
				})->pluck('name', 'name')->sort();
			return $states;
		}

		//no states found
		else {
			return [];
		}

	}

	/**
	 * Run common artisan commands to set shared hosting environment
	 * @return [type] [description]
	 */
	public function artisan() {
		//create storage symlink
		Artisan::call('storage:link');

		return redirect('/');
	}
}
