<?php

namespace App\ModelFilters;

use Carbon\Carbon;

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

	/**
	 * Filter by applicant gender
	 */
	public function gender($value) {
		if (!static::isAll($value)) {
			return $this->related('applicant', 'gender', '=', $value);
		}
	}

	/**
	 * Filter by applican age equal
	 */
	public function ageEqual($age) {
		//go back to birth year
		$year = Carbon::now()->subYears($age)->format('Y');

		return $this->whereHas('applicant', function ($query) use ($year) {
			return $query->whereYear('dob', $year);
		});
	}

	/**
	 * Filter by applican age greater or equal
	 */
	public function ageGreater($age) {
		//go back to birth year
		$year = Carbon::now()->subYears($age)->format('Y');

		return $this->whereHas('applicant', function ($query) use ($year) {
			return $query->whereYear('dob', '<=', $year);
		});
	}

	/**
	 * Filter by applican age less or equal
	 */
	public function ageLess($age) {
		//go back to birth year
		$year = Carbon::now()->subYears($age)->format('Y');

		return $this->whereHas('applicant', function ($query) use ($year) {
			return $query->whereYear('dob', '>=', $year);
		});
	}

	/**
	 * Filter by education levels studied
	 */
	public function level($levels) {
		return $this->whereHas('educations', function ($query) use ($levels) {
			return $query->whereIn('level', $levels);
		});
	}

	/**
	 * Filter by institutions studied
	 */
	public function institution($institutions) {
		return $this->whereHas('educations', function ($query) use ($institutions) {
			return $query->whereIn('institution', $institutions);
		});
	}

	/**
	 * Ensure applicant has experience
	 */
	public function experience($ids) {
		return $this->has('experiences', '>', 0);
	}

	/**
	 * Ensure applicant has achievement
	 */
	public function achievement($ids) {
		return $this->has('achievements', '>', 0);
	}
}
