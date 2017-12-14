<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Jrean\UserVerification\Exceptions\UserNotVerifiedException;
use Jrean\UserVerification\Facades\UserVerification;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws Jrean\UserVerification\Exceptions\UserNotVerifiedException
     */
    public function handle($request, Closure $next)
    {

        if (!$request->user()->verified) {

            //logout
            Auth::guard()->logout();

            //clear session
            $request->session()->flush();
            $request->session()->regenerate();

            //TODO resend confirmation email
            //TODO flash to check confirmation email

            //redirect to login
            return redirect(Config::get('auth.login'));

            // throw new UserNotVerifiedException;
        }

        return $next($request);
    }
}
