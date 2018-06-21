<?php

namespace App\Mail;

use App\Models\ApplicationStage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * A mail to be send to a candidate when advanced to a stage
 */
class StageAccepted extends Mailable {
	use Queueable, SerializesModels;

	public $stage;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(ApplicationStage $stage) {
		$this->stage = $stage;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		//TODO bcc support team or send new email
		$this->from(config('mail.from.address'), config('mail.from.name'));
		$this->subject(config('mail.titles.accepted'));
		return $this->view('mails.accepted');
	}
}
