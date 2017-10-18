<?php

namespace App\ModelFilters;

/**
 * Prepare assignment query filter from query parameters
 */
class AssignmentFilter extends BaseFilter {

	public function title($value) {
		if (!static::isAll($value)) {
			$this->where('title', $value);
		}
	}

	public function client($value) {
		if (!static::isAll($value)) {
			$this->where('client', $value);
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
