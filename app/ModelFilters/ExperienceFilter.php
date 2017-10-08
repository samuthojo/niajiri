<?php

namespace App\ModelFilters;

/**
 * Prepare experience query filter from query parameters
 */
class ExperienceFilter extends BaseFilter {

	public function position($value) {
		if (!static::isAll($value)) {
			$this->where('position', $value);
		}
	}

	public function organization($value) {
		if (!static::isAll($value)) {
			$this->where('organization', $value);
		}
	}

    public function sector($value) {
        if (!static::isAll($value)) {
            $this->where('sector', $value);
        }
    }

    public function location($value) {
        if (!static::isAll($value)) {
            $this->where('location', $value);
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

    public function startEndedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('ended_at', '>=', $value);
        }
    }

    public function endEndedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('ended_at', '<=', $value);
        }
    }
}
