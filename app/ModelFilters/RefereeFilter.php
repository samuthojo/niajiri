<?php

namespace App\ModelFilters;

/**
 * Prepare referee query filter from query parameters
 */
class RefereeFilter extends BaseFilter {

	public function name($value) {
		if (!static::isAll($value)) {
			$this->where('name', $value);
		}
	}

	public function title($value) {
		if (!static::isAll($value)) {
			$this->where('title', $value);
		}
	}

	public function organization($value) {
		if (!static::isAll($value)) {
			$this->where('organization', $value);
		}
	}

	public function email($value) {
		if (!static::isAll($value)) {
			$this->where('email', $value);
		}
	}

	public function mobile($value) {
		if (!static::isAll($value)) {
			$this->where('mobile', $value);
		}
	}

	public function alternative_mobile($value) {
		if (!static::isAll($value)) {
			$this->where('alternative_mobile', $value);
		}
	}

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}
}
