<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Jrean\UserVerification\Exceptions\UserNotVerifiedException;
use Jrean\UserVerification\Facades\UserVerification;

class IsVerified {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 *
	 * @throws Jrean\UserVerification\Exceptions\UserNotVerifiedException
	 */
	public function handle($request, Closure $next) {

		//check if user not verified
		if ($request->user() && !$request->user()->verified) {

			//get login user
			$user = $request->user();

			//ensure verification token exists
			if (!is_set($user->verification_token)) {
				UserVerification::generate($user);
			}
			//resend confirmation email
			UserVerification::sendQueue($user, trans('auth.verify_account'));

			//logout current user if already logged in
			Auth::guard()->logout();

			//clear session(flush & regenerate)
			$request->session()->invalidate();

			//redirect to login
			return redirect()->route('login')
				->withErrors(['email' => [trans('auth.not_verified')]]);

			// throw new UserNotVerifiedException;
		}

		//user verified
		else {
			return $next($request);
		}
	}
}
