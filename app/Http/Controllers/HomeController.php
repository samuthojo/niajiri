<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStage;
use App\Models\Role;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends SecureController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

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

    //TODO move to SiteController
    public function landing(Request $request)
    {
        return view('landing.index', ['route_title' => 'landing']);
    }

    public function minor(Request $request)
    {
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
    public function get_states(Request $request)
    {
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
    public function artisan()
    {
        //create storage symlink
        Artisan::call('storage:link');

        return redirect('/');
    }

    //mails rendering test

    /**
     * Render register email
     * @param  Request $request [description]
     */
    public function registered(Request $request)
    {
        $user = \App\Models\User::query()->first();
        return new \App\Mail\Registered($user);
    }

    /**
     * Render apply email
     * @param  Request $request [description]
     */
    public function applied(Request $request)
    {
        $user = \App\Models\User::query()->first();
        $application = \App\Models\Application::query()->first();
        return new \App\Mail\Applied($user, $application);
    }

    /**
     * Render stage accepted email
     * @param  Request $request [description]
     */
    public function accepted(Request $request)
    {
        $user = \App\Models\User::query()->first();
        $stage = \App\Models\ApplicationStage::query()->first();
        return new \App\Mail\StageAccepted($stage);
    }

    /**
     * Render stage rejected email
     * @param  Request $request [description]
     */
    public function rejected(Request $request)
    {
        $user = \App\Models\User::query()->first();
        $stage = \App\Models\ApplicationStage::query()->first();
        return new \App\Mail\StageRejected($stage);
    }
}
