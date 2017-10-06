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
        return view('pages.dashboard.index');
    }
    public function minor(Request $request)
    {
        return view('pages.dashboard.minor');
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
