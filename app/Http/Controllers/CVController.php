<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;


class CVController extends SecureController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_basic(Request $request)
    {
        $data = [
            'route_title' => 'Basic Details',
            'route_description' => 'Basic Details',
            'user' => \Auth::user(),
            'instance' => \Auth::user()
        ];

        return view('cvs.basic.edit', $data); 
    }

    public function post_basic(Request $request)
    {
        //TODO update cv
        return redirect()->route('cvs.basic');
    }
}
