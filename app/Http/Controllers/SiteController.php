<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(Request $request) {
		return view('landing.index', ['route_title' => 'landing']);
	}
}
