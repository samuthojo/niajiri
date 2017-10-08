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

    public function get_education(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Education Details',
            'route_description' => 'Education Details'
        ]);
    }

    public function get_certificates(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Proffessional Certificates',
            'route_description' => 'Proffessional Certificates'
        ]);
    }

    public function get_experiences(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Work Experiences',
            'route_description' => 'Work Experiences'
        ]);
    }

    public function get_languages(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Languages',
            'route_description' => 'Languages'
        ]);
    }

    public function get_referees(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Referees',
            'route_description' => 'Referees'
        ]);
    }

    public function get_achievements(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Honors/Awards',
            'route_description' => 'Honors/Awards'
        ]);
    }

    public function get_assignments(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Projects',
            'route_description' => 'Projects'
        ]);
    }

    public function get_publications(Request $request)
    {
        return view('pages.dashboard.index', [
            'route_title' => 'Publications',
            'route_description' => 'Publications'
        ]);
    }
}
