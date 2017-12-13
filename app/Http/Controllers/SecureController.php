<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SecureController extends Controller {

	public function __construct() {
		parent::__construct();

		//ensure user is authenticated
		$this->middleware('auth', ['except' => ['preview', 'showOpenPosition']]);

	}

}
