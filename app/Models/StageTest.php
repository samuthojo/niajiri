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
		'questionAttempts',
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

	/**
	 * Get question attempts associate with stage test
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function questionAttempts() {
		return $this->hasMany('App\Models\QuestionAttempt', 'stagetest_id');
	}

	/**
	 * Compute application stage test score
	 * @return float
	 */
	public function computeScore() {
		//1..initialize stage test score
		$score = 0;

		//2..obtain question attempts
		$attempts = $this->questionAttempts;

		//3..accumulate score if attempt answer is correct
		if ($attempts->count() > 0) {

			$score = $attempts->sum(function ($attempt) {

				//..initialize question score
				$questionScore = 0;

				//3.1...obtain question attempt question
				$question = $attempt->question;

				if ($question !== null) {

					//3.2...check for correctness
					$isCorrect =
						($attempt->answer === $question->correct);

					//3.3...prepare question score
					$questionScore =
						($isCorrect ? $question->weight : 0);

				}

				//return questionScore
				return $questionScore;

			});

			//4.. compute percentage score

			//4.1... obtain test questions count
			$test = $this->test;

			$questionCount = $test->questions->count();

			$score = ($score / $questionCount) * 100;

		}

		return $score;
	}

}
