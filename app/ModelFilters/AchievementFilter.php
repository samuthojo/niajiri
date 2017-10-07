<?php

namespace App\ModelFilters;

/**
 * Prepare achievement query filter from query parameters
 */
class AchievementFilter extends BaseFilter {

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

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}

	public function startIssuedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('issued_at', '>=', $value);
        }
    }

    public function endIssuedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('issued_at', '<=', $value);
        }
    }
}
