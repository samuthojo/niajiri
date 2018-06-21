<?php

namespace App\ModelFilters;

/**
 * Prepare stage test query filter from query parameters
 */
class StageTestFilter extends BaseFilter {

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}

	public function application($value) {
		if (!static::isAll($value)) {
			$this->where('application_id', $value);
		}
	}

	public function position($value) {
		if (!static::isAll($value)) {
			$this->where('position_id', $value);
		}
	}

	public function stage($value) {
		if (!static::isAll($value)) {
			$this->where('stage_id', $value);
		}
	}

	public function test($value) {
		if (!static::isAll($value)) {
			$this->where('test_id', $value);
		}
	}

	public function applicationStage($value) {
		if (!static::isAll($value)) {
			$this->where('applicationstage_id', $value);
		}
	}

	public function startCreatedAt($value) {
		$value = static::parseDate($value);
		if (!empty($value)) {
			$this->whereDate('created_at', '>=', $value);
		}
	}

	public function endCreatedAt($value) {
		$value = static::parseDate($value);
		if (!empty($value)) {
			$this->whereDate('created_at', '<=', $value);
		}
	}
}
