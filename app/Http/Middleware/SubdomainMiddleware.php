<?php

namespace App\Http\Middleware;

use Closure;
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
        if(sizeof($url_array) > 3){
          $subdomain = $url_array[0];
          $project = Project::where('slug', $subdomain)->first();
          if(!empty($project)){
            session(['project_id' => $project->id]);
          }else {
            return response('Unauthorized.'.$subdomain, 401);
          }
        }


        return $next($request);
    }
}
