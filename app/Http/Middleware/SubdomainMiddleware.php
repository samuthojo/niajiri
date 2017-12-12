<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\Project;

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
        $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
        if(sizeof($url_array) > 1){
          $subdomain = $url_array[0];
          $project = Project::where('name', $subdomain)->first();
          return response('Unauthorized.'.$subdomain, 401);
          if(!empty($project)){
            return $project;
          }
        }


        return $next($request);
    }
}
