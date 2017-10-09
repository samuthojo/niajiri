<?php

namespace App\ModelFilters;

/**
 * Prepare application query filter from query parameters
 */
class ApplicationFilter extends BaseFilter {

	public function organization($value) {
		if (!static::isAll($value)) {
			$this->where('organization_id', $value);
		}
	}

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}

	public function position($value) {
		if (!static::isAll($value)) {
			$this->where('position_id', $value);
		}
	}

	public function startCreatedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('created_at', '>=', $value);
        }
    }

    public function endCreatedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('created_at', '<=', $value);
        }
    }
}
