<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * A mail to be send to a candidate when applying to a position
 */
class Applied extends Mailable {
	use Queueable, SerializesModels;

    public $user;
	public $application;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, Application $application) {
		$this->user = $user;
        $this->application = $application;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		//TODO bcc support team or send new email
		// TODO Add from address in mail config 
		$this->from(config('mail.from.address'), config('mail.from.name'));
		$this->subject(config('mail.titles.apply'));
		return $this->view('mails.apply');
	}
}
