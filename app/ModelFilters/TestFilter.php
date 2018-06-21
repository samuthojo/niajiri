<?php

namespace App\ModelFilters;

/**
 * Prepare test query filter from query parameters
 */
class TestFilter extends BaseFilter {

	public function category($value) {
		if (!static::isAll($value)) {
			$this->where('category', $value);
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
