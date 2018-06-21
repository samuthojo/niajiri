<?php

namespace App\Models;

use App\Models\Base as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Position
 * @package App\Models
 * @version October 6, 2017, 2:04 am UTC
 *
 * @property \App\Models\Organization organization
 * @property \App\Models\Project project
 * @property \App\Models\Sector sector
 * @property \Illuminate\Database\Eloquent\Collection organizations
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string title
 * @property string summary
 * @property string responsibilities
 * @property string requirements
 * @property string duration
 * @property date dueAt
 * @property date publishedAt
 * @property string project_id
 * @property string organization_id
 * @property string sector_id
 */
class Position extends Model {
	use SoftDeletes;

	public $table = 'positions';

	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $dates = ['deleted_at'];

	/**
	 * Relations to eager load
	 */
	protected $withables = [
		'organization',
		'project',
		'sector',
		'stages',
	];

	public $fillable = [
		'title',
		'summary',
		'responsibilities',
		'requirements',
		'duration',
		'dueAt',
		'publishedAt',
		'project_id',
		'organization_id',
		'sector_id',
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'string',
		'title' => 'string',
		'summary' => 'longText',
		'responsibilities' => 'longText',
		'requirements' => 'longText',
		'duration' => 'string',
		'dueAt' => 'date',
		'publishedAt' => 'date',
		'project_id' => 'string',
		'organization_id' => 'string',
		'sector_id' => 'string',
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [

	];

	/**
	 * Get and format the position's due_at for forms.
	 *
	 * @param  string  $value
	 * @return string
	 * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
	 */
	public function formDueAtAttribute($value) {
		if (is_set($value)) {
			$value = Carbon::parse($value);
			$value = $value->format(config('app.datepicker_parse_format'));
		}
		return $value;
	}

	/**
	 * Get and format the position's published_at for forms.
	 *
	 * @param  string  $value
	 * @return string
	 * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
	 */
	public function formPublishedAtAttribute($value) {
		if (is_set($value)) {
			$value = Carbon::parse($value);
			$value = $value->format(config('app.datepicker_parse_format'));
		}
		return $value;
	}

	/**
	 * Scope a query to obtain open position only
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function scopeOpen($query) {
		//TODO ensure only published position
		//TODO should we allow application on deadline
		//TODO please use laravel migration convection

		$query->where('dueAt', '>', Carbon::now()->format('Y-m-d'));
		$query->whereNotNull('publishedAt');
		$query->orderBy('dueAt', 'asc');

		return $query;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function organization() {
		return $this->belongsTo(\App\Models\User::class, 'organization_id')->withTrashed();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function project() {
		return $this->belongsTo(\App\Models\Project::class, 'project_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function sector() {
		return $this->belongsTo(\App\Models\Sector::class, 'sector_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function stages() {
		return $this->hasMany(\App\Models\Stage::class, 'position_id');
	}

	/**
	 * Obtain position first stage
	 * @return [Stage]
	 */
	public function firstStage() {
		$sorted_stages = $this->stages->sortBy('number');
		$first_stage = $sorted_stages->first();
		return $first_stage;
	}

	/**
	 * Check if provided stage is first position applying stage
	 * @param  App\Models\Stage  $stage
	 * @return boolean
	 */
	public function isFirstStage($stage = null) {
		if (is_set($stage)) {
			$first_stage = $this->firstStage();
			$is_first_stage = ($first_stage->id === $stage->id);
			return $is_first_stage;
		}

		return false;
	}

	/**
	 * Obtain position last stage
	 * @return App\Models\Stage
	 */
	public function lastStage() {
		$sorted_stages = $this->stages->sortBy('number');
		$last_stage = $sorted_stages->last();
		return $last_stage;
	}

	/**
	 * Check if provided stage is last position applying stage
	 * @param  App\Models\Stage  $stage
	 * @return boolean
	 */
	public function isLastStage($stage = null) {
		if (is_set($stage)) {
			$last_stage = $this->lastStage();
			$is_last_stage = ($last_stage->id === $stage->id);
			return $is_last_stage;
		}

		return true;
	}

	/**
	 * Obtain position next stage after specified stage
	 * @param  [Stage]  $stage
	 * @return [Stage]
	 */
	public function nextStage($stage = null) {
		//default to last stage
		$next_stage = $this->lastStage();

		if ($stage != null) {
			//get next stage number
			$next_stage_number = $stage->number + 1;

			//get next stage
			$next_stage = $this->stages->first(function ($stage) use ($next_stage_number) {
				return $stage->number == $next_stage_number;
			});

			if ($next_stage == null) {
				$next_stage = $this->lastStage();
			}

		}

		return $next_stage;
	}

}
