<?php

namespace App\Mail;

use App\Models\User;
use App\Models\ApplicationStage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * A mail to be send to a candidate when rejected to advance a stage
 */
class StageRejected extends Mailable {
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
		$this->subject(config('mail.titles.rejected'));
		return $this->view('mails.rejected');
	}
}
