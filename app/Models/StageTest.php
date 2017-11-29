<?php

namespace App\Models;

use App\Models\Base as Model;

class StageTest extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stage_tests';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'applicant_id', 'application_id',
		'position_id', 'stage_id',
		'test_id', 'applicationstage_id',
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
	];

	/**
	 * Relations to eager load
	 */
	protected $withables = [
		'applicant',
		'application',
		'position',
		'stage',
		'test',
		'applicationStage',
	];

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [

	];

	/**
	 * Get applicant associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function applicant() {
		return $this->belongsTo('App\Models\User', 'applicant_id');
	}

	/**
	 * Get application associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function application() {
		return $this->belongsTo('App\Models\Application', 'application_id');
	}

	/**
	 * Get position associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function position() {
		return $this->belongsTo('App\Models\Position', 'position_id');
	}

	/**
	 * Get stage associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function stage() {
		return $this->belongsTo('App\Models\Stage', 'stage_id');
	}

	/**
	 * Get test associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function test() {
		return $this->belongsTo('App\Models\Test', 'test_id');
	}

	/**
	 * Get application stage associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function applicationStage() {
		return $this->belongsTo('App\Models\ApplicationStage', 'applicationstage_id');
	}

}
