<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends SecureController
{
    public function getPdfPayload()
    {
      $user = \Auth::user();

  		$data = [
  			'user' => $user,
        'experiences' => $user->experiences,
        'languages' => $user->languages,
        'referees' =>$user->referees,
  			'honors' => $this->achievements($user),
  			'certificates' => $this->certificates($user),
  			'educations' => $this->educations($user),
        'institutions' => config('education.institutions'),
        'qualifications' => config('education.qualifications'),
  		];

      return $data;
    }

    private function achievements($user) {
  		return $user->achievements()
  								->get()->map(function ($achievement) {
  										if($achievement->attachment()) {
  											$file = $achievement->attachment();
  											$achievement->attachment = $file->getUrl('thumb');
  											$achievement->attachmentName = $file->name;
  									  }

  									  return $achievement;
  								});
  	}

  	private function certificates($user) {
  		return $user->certificates()
  								->get()->map(function ($certificate) {
  										if($certificate->attachment()) {
  											$file = $certificate->attachment();
  											$certificate->attachment = $file->getUrl('thumb');
  											$certificate->attachmentName = $file->name;
  									  }

  									  return $certificate;
  								});
  	}

  	private function educations($user) {
  		return $user->educations()
  								->get()->map(function ($education) {
  										if($education->attachment()) {
  											$file = $education->attachment();
  											$education->attachment = $file->getUrl('thumb');
  											$education->attachmentName = $file->name;
  									  }

  									  return $education;
  								});
  	}
}
