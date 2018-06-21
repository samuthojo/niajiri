<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SecureController extends Controller {

	public function __construct() {
		parent::__construct();

		//ensure user is authenticated
		$this->middleware('auth');

		//ensure user is verified
        $this->middleware('isVerified');
        //TODO flash unverified is user not verified
        //TODO once user register provide directions to look on the 
        //email to verify account
        //TODO allow user to resend verification email

	}

}
