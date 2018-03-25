<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

/**
 * A newsletter to users
 */
class NewsLetters extends Mailable {
	use Queueable, SerializesModels;

	public $user;
	public $subject;
	public $notification;
	public $attachedFiles;
	public $mailContents;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user,$attachedFile,$notification) {
        $this->user = $user;
		$this->subject = "Niajiri monthly newsletter";
		$this->attachedFile = $attachedFile;
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
		$this->subject($this->subject);
		return $this->view('mails.newsletter')->attach($this->attachedFile->getPath(),[
												'mime' => $this->attachedFile->mime_type,
												'as' => $this->attachedFile->file_name
												]);
	}
}
