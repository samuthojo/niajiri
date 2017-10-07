<?php

namespace App\ModelFilters;

/**
 * Prepare certificate query filter from query parameters
 */
class CertificateFilter extends BaseFilter {

	public function title($value) {
		if (!static::isAll($value)) {
			$this->where('title', $value);
		}
	}

	public function institution($value) {
		if (!static::isAll($value)) {
			$this->where('institution', $value);
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

    public function startExpiredAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('expired_at', '>=', $value);
        }
    }

    public function endExpiredAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('expired_at', '<=', $value);
        }
    }
}
