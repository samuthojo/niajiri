<?php

namespace App\Models;

use App\Models\Base as Model;
use App\Models\QuestionAttempt;
use App\Models\StageTest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Test
 * @package App\Models
 * @version October 9, 2017, 4:59 pm UTC
 *
 * @property \App\Models\Stage stage
 * @property \App\Models\TestCategory testCategory
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection QuestionAttempt
 * @property \Illuminate\Database\Eloquent\Collection Question
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property decimal duration
 * @property string stage_id
 * @property string category
 */
class Test extends Model {

	use SoftDeletes;

	public $table = 'tests';

	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $dates = ['deleted_at'];

	/**
	 * Relations to eager load
	 */
	protected $withables = [
		'position',
		'stage',
		'questions',
	];

	public $fillable = [
		'duration',
		'stage_id',
		'position_id',
		'category',
	];

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		/**
		 * Columns and their priority in search results.
		 * Columns with higher values are more important.
		 * Columns with equal values have equal importance.
		 *
		 * @var array
		 */
		'columns' => [
			'tests.category' => 10,

			//position searchable fields
			'position.title' => 10,

			//stage searchable fields
			'stage.name' => 10,
		],

		'joins' => [ //ensure relations are also eager loaded. see query below
			'positions as position' => ['position.id', 'tests.position_id'],
			'stages as stage' => ['stage.id', 'tests.stage_id'],
		],
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'string',
		'position_id' => 'string',
		'stage_id' => 'string',
		'category' => 'string',
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [

	];

	/**
	 * Get and format the project's started_at for forms.
	 *
	 * @param  string  $value
	 * @return string
	 * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
	 */
	public function formStartedAtAttribute($value) {
		if (is_set($value)) {
			$value = Carbon::parse($value);
			$value = $value->format(config('app.datepicker_parse_format'));
		}
		return $value;
	}

	/**
	 * Get and format the project's ended_at for forms.
	 *
	 * @param  string  $value
	 * @return string
	 * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
	 */
	public function formEndedAtAttribute($value) {
		if (is_set($value)) {
			$value = Carbon::parse($value);
			$value = $value->format(config('app.datepicker_parse_format'));
		}
		return $value;
	}

	/**
	 * Get position associated with this test
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function position() {
		return $this->belongsTo('App\Models\Position', 'position_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function stage() {
		return $this->belongsTo(\App\Models\Stage::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function questions() {
		return $this->hasMany(\App\Models\Question::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function attempts() {
		return $this->hasMany('App\Models\StageTest', 'test_id');
	}

	/**
	 * Clone current test details(properties + questions)
	 * @return App\Models\Test
	 */
	public function copyInto($copier = []) {

		//reference $this context
		$me = $this;

		return \DB::transaction(function () use ($copier, $me) {

			//dont copy
			if (empty($copier) && !array_has('position_id')
				&& !array_has('stage_id')) {
				return null;
			}

			//continue with copying
			else {
				$finder = array_merge(['category' => $me->category], $copier);
				$creator = array_merge([
					'category' => $me->category,
					'duration' => $me->duration,
				], $copier);
				$test = Test::updateOrCreate($finder, $creator);

				//copy questions if there is not attempt
				if ($me->questions->count() > 0) {

					$copier = ['test_id' => $me->id];

					$me->questions->each(function ($question) use ($copier) {
						$question->copyInto($copier);
					});

				}

				return $test;
			}

		});

	}

	/**
	 * Attempt position stage test
	 * @param  array $attempt test attempt input collection
	 * @return \App\Models\StageTest
	 */
	public static function attempt($attempt = null) {

		//0...ensure attempt
		if (is_set($attempt)) {

			//1...record test question attempts
			return \DB::transaction(function () use ($attempt) {

				//1.1..check for attempted questions
				$has_attempts = array_has($attempt, 'attempts');
				$attempts = $has_attempts ? $attempt['attempts'] : [];

				//1.3..load existing test
				$test = Test::query()
					->where('position_id', $attempt['position_id'])
					->where('stage_id', $attempt['stage_id'])
					->where('id', $attempt['test_id'])
					->firstOrFail();

				//2..persist stage test
				$stagetest = [
					'applicant_id' => $attempt['applicant_id'],
					'application_id' => $attempt['application_id'],
					'position_id' => $attempt['position_id'],
					'stage_id' => $attempt['stage_id'],
					'test_id' => $attempt['test_id'],
					'applicationstage_id' => $attempt['applicationstage_id'],
				];
				$stagetest = StageTest::create($stagetest);

				//2.1...persists question attempted
				$attempted = [
					'applicant_id' => $attempt['applicant_id'],
					'position_id' => $attempt['position_id'],
					'stage_id' => $attempt['stage_id'],
					'test_id' => $attempt['test_id'],
					'stagetest_id' => $stagetest->id,
				];

				//2.2...load all questions and merge attempts
				$questions = $test->questions->map(function ($question) {
					return [
						'question_id' => $question->id,
						'answer' => 'N/A',
					];
				});
				$attempts = $questions->merge($attempts)->all();

				foreach ($attempts as $taken) {

					$question_attempt = [
						'question_id' => $taken['question_id'],
						'answer' => $taken['answer'],
					];

					$question_attempt =
						array_merge([], $attempted, $question_attempt);

					//3..persist question attempt
					QuestionAttempt::create($question_attempt);
				}

				//4.. return stage test
				return $stagetest;

			});
		}

	}
}
