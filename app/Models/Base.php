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
use Carbon\Carbon;

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
	 * Default form dates parse format
	 * @var null
	 */
	protected $parseFormat = null;


	/**
	 * Get form dates parse format
	 * @return string
	 */
	public function getParseFormat()
	{
		return $this->parseFormat;
	}

	/**
	 * Set form dates parse format
	 */
	public function setParseFormat($value)
	{
		$this->parseFormat = $value;
	}

	/**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


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

			//match m-Y
			if (is_string($value)) {
				
				//match Y-m-d
				$isMysqlDate = preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $value);

				//parse mysql date
				if($isMysqlDate){
					$value = Carbon::createFromFormat(config('app.mysql_date_formart'), $value);
				}

				//continue parse use provided model format
				else{
					$parseFormat = 
						is_set($this->parseFormat) ? $this->parseFormat : config('app.datepicker_parse_format');
					$value = Carbon::createFromFormat($parseFormat, $value);
				}
			}

			return $value;
			
		} catch (\Exception $e) {
			return parent::fromDateTime($value);
		}
	}
}
