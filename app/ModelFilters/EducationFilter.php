<?php

namespace App\ModelFilters;

/**
 * Prepare education query filter from query parameters
 */
class EducationFilter extends BaseFilter {

	public function level($value) {
		if (!static::isAll($value)) {
			$this->where('level', $value);
		}
	}

	public function institution($value) {
		if (!static::isAll($value)) {
			$this->where('institution', $value);
		}
	}

    public function remark($value) {
        if (!static::isAll($value)) {
            $this->where('remark', $value);
        }
    }

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}

	public function startStartedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('started_at', '>=', $value);
        }
    }

    public function endStartedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('started_at', '<=', $value);
        }
    }

    public function startFinishedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('finished_at', '>=', $value);
        }
    }

    public function endFinishedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('finished_at', '<=', $value);
        }
    }

}
