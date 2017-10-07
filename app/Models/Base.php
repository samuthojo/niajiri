<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use App\Traits\Sugarize;
use App\Traits\Withable;
use Collective\Html\Eloquent\FormAccessible;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Watson\Rememberable\Rememberable;
use Webpatser\Uuid\Uuid;

/**
 * Application base model
 */
class Base extends Model implements AuditableContract {
	/**
	 * Use Uuid as primary key
	 */
	use UuidModelTrait;

	/**
	 * Enable model to be searchable
	 */
	use SearchableTrait;

	/**
	 * Use query caching
	 */
	use Rememberable;

	/**
	 * Use auditable
	 */
	use Auditable;

	/**
	 * Provide access to form accessor
	 */
	use FormAccessible;

	/**
	 * Do not actually remove the model from the database.
	 */
	use SoftDeletes;

	/**
	 * Make model to eager load defined relations
	 * @see App\Traits\Withable
	 */
	use Withable;

	/**
	 * Extend model query builder with english words
	 * @see App\Traits\Sugarize
	 */
	use Sugarize;

	/**
	 * Make a model filterable
	 * @see EloquentFilter\Filterable;
	 */
	use Filterable;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Auditable Model audits.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function audits() {
		return $this->morphMany('App\Audit', 'auditable');
	}

	/**
	 * Convert a DateTime to a storable string.
	 *
	 * @param  \DateTime|int|string  $value
	 * @return string
	 */
	public function fromDateTime($value) {
		try {
			if (is_string($value)) {
				$value = Carbon::createFromFormat(config('app.datepicker_parse_format'), $value);
			}
			return $value;
		} catch (\Exception $e) {
			return parent::fromDateTime($value);
		}
	}
}
