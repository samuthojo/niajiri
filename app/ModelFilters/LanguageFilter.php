<?php

namespace App\ModelFilters;

/**
 * Prepare language query filter from query parameters
 */
class LanguageFilter extends BaseFilter {

	public function name($value) {
		if (!static::isAll($value)) {
			$this->where('name', $value);
		}
	}

	public function fluency($value) {
		if (!static::isAll($value)) {
			$this->where('fluency', $value);
		}
	}

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}
}
