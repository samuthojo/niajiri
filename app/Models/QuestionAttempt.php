<?php

namespace App\Models;

use App\Models\Base as Model;

class QuestionAttempt extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'question_attempts';

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
		'applicant_id', 'position_id',
		'stage_id', 'test_id',
		'question_id', 'stagetest_id',
		'answer',
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
		'position',
		'stage',
		'test',
		'question',
		'stageTest',
	];

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [

	];

	/**
	 * Get applicant associate with question attempt
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function applicant() {
		return $this->belongsTo('App\Models\User', 'applicant_id');
	}

	/**
	 * Get position associate with question attempt
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function position() {
		return $this->belongsTo('App\Models\Position', 'position_id');
	}

	/**
	 * Get stage associate with question attempt
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function stage() {
		return $this->belongsTo('App\Models\Stage', 'stage_id');
	}

	/**
	 * Get test associate with question attempt
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function test() {
		return $this->belongsTo('App\Models\Test', 'test_id');
	}

	/**
	 * Get question associate with question attempt
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function question() {
		return $this->belongsTo('App\Models\Question', 'question_id');
	}

	/**
	 * Get stage test associate with question attempt
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function stageTest() {
		return $this->belongsTo('App\Models\StageTest', 'stagetest_id');
	}

}
