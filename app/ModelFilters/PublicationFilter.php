<?php

namespace App\ModelFilters;

/**
 * Prepare publication query filter from query parameters
 */
class PublicationFilter extends BaseFilter {

	public function title($value) {
		if (!static::isAll($value)) {
			$this->where('title', $value);
		}
	}

	public function publisher($value) {
		if (!static::isAll($value)) {
			$this->where('publisher', $value);
		}
	}

	public function applicant($value) {
		if (!static::isAll($value)) {
			$this->where('applicant_id', $value);
		}
	}

	public function startPublishedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('published_at', '>=', $value);
        }
    }

    public function endPublishedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('published_at', '<=', $value);
        }
    }
}
