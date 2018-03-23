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
	public $hasFile = 0;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user,Request $request) {
        $this->user = $user;
		$this->subject = "Niajiri monthly newsletter";
		$this->mailContents = $request->all();
		$this->notification = $this->mailContents['message'];
		if($request->hasFile('newsAttach')){
			$this->hasFile = 1;
			$this->attachedFiles = $this->mailContents['newsAttach'];
		}
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
		// Attach file(s)
		$mailTemplate = $this->view('mails.newsletter');
		if($this->hasFile){
			for ($i = 0; $i < count($this->attachedFiles); $i++){
				//Get properties for current file
				$fileProperties = $this->attachedFiles[$i];
				$filePath = $fileProperties->getRealPath();
				$filename = $fileProperties->getClientOriginalName();
				$fileMime = $fileProperties->getMimeType();

				//Attach current file to the mail
				$mailTemplate = $mailTemplate->attach($filePath,[
												'mime' => $fileMime,
												'as' => $filename
				]);
		}
		}
		return $mailTemplate;
	}
}
