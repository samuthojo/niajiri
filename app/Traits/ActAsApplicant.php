<?php

namespace App\Traits;

/**
 * Extends a user model with applicant abilities
 */
trait ActAsApplicant {
	//------------------------------------------------------------
	//instance properties & methods
	//------------------------------------------------------------
	
	/**
	 * check if applicant has a basic details
	 * @return string route to redirect user
	 */
	public function hasBasicDetails()
	{
		$hasBasicDetails = is_set($this->first_name) && is_set($this->surname); 
		$hasBasicDetails = $hasBasicDetails && is_set($this->email) && is_set($this->mobile);
		$hasBasicDetails = $hasBasicDetails && is_set($this->gender) && is_set($this->dob); 
		$hasBasicDetails = $hasBasicDetails && is_set($this->marital_status);
		$hasBasicDetails = $hasBasicDetails && is_set($this->summary);
		$hasBasicDetails = $hasBasicDetails && is_set($this->country) && is_set($this->state);

		return $hasBasicDetails;
	}

	/**
	 * Obtain local key used in applicant relations
	 */
	public function getApplicantLocalKey() {
		$applicantLocalKey = is_set($this->applicantLocalKey) ? $this->applicantLocalKey : 'id';
		return $applicantLocalKey;
	}

	//------------------------------------------------------------
	//relations
	//------------------------------------------------------------

	/**
	 * Get the applicant languages.
	 */
	public function languages() {
		return $this->hasMany('App\Models\Language', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant referees.
	 */
	public function referees() {
		return $this->hasMany('App\Models\Referee', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant experiences.
	 */
	public function experiences() {
		return $this->hasMany('App\Models\Experience', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant publications.
	 */
	public function publications() {
		return $this->hasMany('App\Models\Publication', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant educations.
	 */
	public function educations() {
		return $this->hasMany('App\Models\Education', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant achievements.
	 */
	public function achievements() {
		return $this->hasMany('App\Models\Achievement', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant proffessional certificates.
	 */
	public function certificates() {
		return $this->hasMany('App\Models\Certificate', 'applicant_id', $this->getApplicantLocalKey());
	}

	/**
	 * Get the applicant  project(assignments).
	 */
	public function assignments() {
		return $this->hasMany('App\Models\Assignment', 'applicant_id', $this->getApplicantLocalKey());
	}

	//------------------------------------------------------------
	//class properties & methods
	//------------------------------------------------------------
}
