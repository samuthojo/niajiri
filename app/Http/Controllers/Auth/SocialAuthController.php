<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Registered;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Socialite;

class SocialAuthController extends Controller {

	private $redirectUri = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware(['web', 'guest']);
	}

	/**
	 * Social Login
	 *
	 * @param  string $providerName
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function signIn($providerName) {
		if ($providerName == 'facebook') {
			return Socialite::driver('facebook')->redirect();
		}

		if ($providerName == 'google') {
			return Socialite::driver('google')->redirect();
		}

		if ($providerName == 'twitter') {
			return Socialite::driver('twitter')->redirect();
		}

		if ($providerName == 'linkedin') {
			return Socialite::driver('linkedin')->redirect();
		}

		if ($providerName == 'yahoo') {
			return Socialite::driver('yahoo')->redirect();
		}

		Session::flash('error', 'Provider does not support.');
		return redirect($this->redirectUri);
	}

	/**
	 * Social Login Callback
	 *
	 * @param  string $providerName
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function signInCallback($providerName, Request $request) {

		if (!$request->has('code') && !$request->has('oauth_token')) {

			Session::flash('error', 'You need to grant permission to access your public data.');
			return redirect($this->redirectUri);

		}

		if ($providerName == 'facebook' || $providerName == 'google' ||
			$providerName == 'twitter' || $providerName == 'linkedin' ||
			$providerName == 'yahoo') {
			return $this->callback($providerName);
		}

		return redirect($this->redirectUri);
	}

	/**
	 * social callback
	 *
	 * @return \Illuminate\Http\Response
	 */
	private function callback($provider) {
		//TODO ensure user name and email

		//obtain user social profile
		$user = Socialite::driver($provider)->user();

		$user = User::findOrCreateByProvider($provider, $user);

		//assing applicant role by default if no role at all
		if ($user->roles->count() === 0) {
			$roles = Role::where('name', Role::APPLICANT)->get();
			$user->detachRoles();
			$user->save();
			$user->attachRoles($roles);
			$user->save();
		}

		//welcome user
		if (!$user->verified) {
			try {

				//queue welcome email
				Mail::to($user)->queue(new Registered($user));

				//update user to be verified
				$user->verified = true;
				$user->save();
			} catch (\Exception $e) {
				//DO nothing next register will send welcome message
			}
		}

        //auto login social authenticated user
		Auth::login($user);

		//redirect to previous url or continue
		return redirect()->intended($this->redirectUri);
	}

}
