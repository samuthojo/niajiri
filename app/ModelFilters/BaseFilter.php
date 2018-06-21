<?php

namespace App\ModelFilters;

use Carbon\Carbon;
use EloquentFilter\ModelFilter;

/**
 * Prepare base model query filter from query parameters
 */
class BaseFilter extends ModelFilter {
	/**
	 * Filter value for all value
	 */
	const ALL = 'All';

	public function setup() {
		$this->populate();
	}

	public function q($value) {
		$this->search($value);
	}

	/**
	 * Helper to check if filter value is equal to all
	 * @param  mixed  $value [description]
	 * @return boolean        [description]
	 */
	public static function isAll($value = null) {
		$isAll =
			(!empty($value) && !is_array($value) && strcmp($value, self::ALL) === 0);
		return $isAll;
	}

	/**
	 * Helper to value to date whenever possible
	 * @param  mixed  $value [description]
	 * @return boolean        [description]
	 */
	public static function parseDate($value) {
		try {
			$value = Carbon::createFromFormat(config('app.datepicker_parse_format'), $value)
				->toDateString();
			return $value;
		} catch (Exception $e) {
			return null;
		}
	}

}
