<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class SubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $localhostWhitelist = array('127.0.0.1','::1');

        if(!in_array($_SERVER['REMOTE_ADDR'], $localhostWhitelist)){
          $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
          if(sizeof($url_array) > 3){
            $subdomain = $url_array[0];
            $organization = User::where('slug', $subdomain)->first();
            if(!empty($organization)){
              session(['organisation_id' => $organization->id]);
            }else {
              return response('Prease check your link again.'.$subdomain, 401);
            }
          }
        }

        return $next($request);
    }
}
