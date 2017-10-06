<?php

namespace App\ModelFilters;

/**
 * Prepare role query filter from query parameters
 */
class RoleFilter extends BaseFilter {

	public function name($value) {
		if (!static::isAll($value)) {
			$this->where('name', $value);
		}
	}

	public function displayName($value) {
		if (!static::isAll($value)) {
			$this->where('display_name', $value);
		}
	}

	public function description($value) {
		if (!static::isAll($value)) {
			$this->where('description', $value);
		}
	}
}
