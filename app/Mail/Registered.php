<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * A mail to be sent to a new social registered user
 */
class Registered extends Mailable {
	use Queueable, SerializesModels;

	public $user;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user) {
		$this->user = $user;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {

		//pass user to message and make it available on event listeners
		$user = $this->user;
		$this->withSwiftMessage(function ($message) use ($user) {
			$message->user = $user;
			$message->type = 'REGISTERED';
		});

		//TODO bcc support team or send new email
		$this->from(config('mail.from.address'), config('mail.from.name'));
		$this->subject(config('mail.titles.register'));
		return $this->view('mails.register');
	}
}
