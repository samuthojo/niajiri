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
class NewsLetter extends Mailable {
	use Queueable, SerializesModels;

	public $user;
	public $subject;
	public $notification;
	public $attachedFiles;
	public $mailContents;
	public $filePath,$filename,$fileMime;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user,Request $request) {
        $this->user = $user;
		$this->subject = "Niajiri weekly newsletter";
		$this->mailContents = $request->all();
        $this->notification = $this->mailContents['message'];
		$this->attachedFiles = $this->mailContents['file'][0];
		$this->filePath = $this->attachedFiles->getRealPath();
		$this->filename = $this->attachedFiles->getClientOriginalName();
		$this->fileMime = $this->attachedFiles->getMimeType();
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
		return $this->view('mails.newsletter')
					->attach($this->filePath,
					['mime' => $this->fileMime,
					'as' => $this->filename]);
	}
}
