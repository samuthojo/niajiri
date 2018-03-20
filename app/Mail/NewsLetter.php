<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * A newsletter to users
 */
class NewsLetter extends Mailable {
	use Queueable, SerializesModels;

	public $user;
	public $subject;
	public $message;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user) {
        $this->user = $user;
        $this->subject = "Niajiri weekly newsletter";
        $this->message = "Noma sana";
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		//TODO bcc support team or send new email
		$this->from(config('mail.from.address'), config('mail.from.name'));
		$this->subject($this->subject);
		return $this->view('mails.newsletter');
	}
}
