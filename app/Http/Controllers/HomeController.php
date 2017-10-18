<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Role;


class HomeController extends SecureController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
      //redirect applicant
      if(\Auth::user()->hasRole(Role::APPLICANT)){
        return redirect()->route('users.basic');
      }

      //redirect hr agency
      else if(\Auth::user()->hasRole([Role::HR_AGENCY, Role::ORGANIZATION])){
        return redirect()->route('positions.index');
      }

      //TODO redirect organization
      else{
        return view('pages.dashboard.index', [
            'route_title' => 'Dashboard',
            'route_description' => 'Dashboard'
        ]);
      }
    }
    
    public function minor(Request $request)
    {
        return view('pages.dashboard.minor',  [
            'route_title' => 'Minor',
            'route_description' => 'Minor'
        ]);
    }

    /**
     * Obtain country states/region/cities
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_states(Request $request)
    {
      $countryName = $request->input('country');

      $country = collect(config('countries'))->first(function ($country) use ($countryName)
      {
         return $country['name'] === $countryName;
      });

      //obtain specific country states
      if($country){
        $states = collect(config('states'))
        ->filter(function ($state) use ($country){
            return $state['countryCode'] === $country['code'];
        })->pluck('name', 'name')->sort();
        return $states;
      }
      
      //no states found
      else{
        return [];
      }

    }

     /**
     * Run common artisan commands to set shared hosting environment
     * @return [type] [description]
     */
    public function artisan()
    {
        //create storage symlink
        Artisan::call('storage:link');

        return redirect('/');
    }
}
