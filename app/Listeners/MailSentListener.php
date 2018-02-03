<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;

class MailSentListener {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  MessageSent  $event
	 * @return void
	 */
	public function handle(MessageSent $event) {

	}
}
