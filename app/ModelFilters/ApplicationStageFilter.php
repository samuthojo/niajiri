<?php

namespace App\ModelFilters;

/**
 * Prepare application stage query filter from query parameters
 */
class ApplicationStageFilter extends BaseFilter {

	public function application($value) {
		if (!static::isAll($value)) {
			$this->where('application_id', $value);
		}
	}

	public function stage($value) {
		if (!static::isAll($value)) {
			$this->where('stage_id', $value);
		}
	}

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

	public function score($value) {
		if (!static::isAll($value)) {
			$this->where('score', $value);
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

	//TODO improve
	public function educations($ids) {
		return $this->whereHas('educations', function ($query) use ($ids) {
			return $query->whereIn('id', $ids);
		});
	}
}
