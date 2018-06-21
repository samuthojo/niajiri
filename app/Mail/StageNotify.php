<?php

namespace App\Mail;

use App\Models\ApplicationStage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * A mail to be send to notify a candidate on specific message
 */
class StageNotify extends Mailable {
	use Queueable, SerializesModels;

	public $stage;
	public $notification;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(ApplicationStage $stage, $notification) {
		$this->stage = $stage;
		$this->notification = $notification;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		//TODO bcc support team or send new email
		$this->from(config('mail.from.address'), config('mail.from.name'));
		$this->subject(config('mail.titles.notification'));
		return $this->view('mails.notify');
	}
}
