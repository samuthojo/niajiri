<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SecureController;
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
        return view('pages.dashboard.index', [
            'route_title' => 'Dashboard',
            'route_description' => 'Dashboard'
        ]);
    }

    //TODO move to applicant controller
    public function applications(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'My Applications',
            'route_description' => 'My Applications'
        ]);
    }

    //TODO move to position controller
    public function positions(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Open Jobs/Positions',
            'route_description' => 'Available Jobs/Positions'
        ]);
    }
    
    public function minor(Request $request)
    {
        return view('pages.dashboard.minor',  [
            'route_title' => 'Minor',
            'route_description' => 'Minor'
        ]);
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
