<?php

namespace App\Models;

use App\Models\Base as Model;
use App\Traits\ActAsApplicant;
use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class ApplicationStage extends Model implements HasMedia {

	/**
	 * Allow eduaction to have attached files(media) i.e certificates etc
	 */
	use HasMediaTrait;

	/**
	 * Extend appliction stage with applicant capabilities
	 */
	use ActAsApplicant;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'application_stages';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Obtain applicant local key used in applicant relations
	 */
	protected $applicantLocalKey = 'applicant_id';

	/**
	 * Relations to eager load
	 */
	protected $withables = [
		'application',
		'stage',
		'applicant',
		'organization',
		'position',
		'tests',
	];

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'score', 'comment',
		'application_id', 'stage_id',
		'applicant_id', 'organization_id', 'position_id',
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime', //used as application date
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
		'score' => 'double',
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
			//applicant searchable fields
			'applicant.name' => 10,
			'applicant.first_name' => 10,
			'applicant.middle_name' => 10,
			'applicant.surname' => 10,
			'applicant.gender' => 10,
			'applicant.marital_status' => 10,
			'applicant.email' => 10,
			'applicant.mobile' => 10,
			'applicant.landline' => 8,
			'applicant.fax' => 5,
			'applicant.postal_address' => 5,
			'applicant.physical_address' => 5,
			'applicant.skills' => 5,
			'applicant.interests' => 5,
			'applicant.hobbies' => 5,
			'applicant.country' => 10,
			'applicant.state' => 10,
		],
		'joins' => [ //ensure relations are also eager loaded. see query below
			'users as applicant' => ['applicant.id', 'application_stages.applicant_id'],
		],
	];

	/**
	 * Get computed applation stage score
	 *
	 * @param  float  $value
	 * @return float
	 */
	public function getScoreAttribute($value) {

		//compute score from test
		if ($this->tests->count() > 0) {
			$this->score = $this->tests->avg(function ($test) {
				return $test->computeScore();
			});
		}

		return $value;
	}

	/**
	 * Get and format the achievement's finished_at for forms.
	 *
	 * @param  string  $value
	 * @return string
	 * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
	 */
	public function formCreatedAtAttribute($value) {
		if (is_set($value)) {
			$value = Carbon::parse($value);
			$value = $value->format(config('app.datepicker_parse_format'));
		}
		return $value;
	}

	/**
	 * Check if application stage has test
	 * @return boolean
	 */
	public function hasTest() {
		$has_test = $this->stage !== null && $this->stage->hasTest;
		return $has_test;
	}

	/**
	 * Check if application stage test has been taken already
	 * @return boolean
	 */
	public function testIsAlreadyTaken($test = null) {

		$stageTest = null;

		if ($test) {
			$stageTest = $this->tests->first(function ($stageTest) use ($test) {
				return $stageTest->test_id === $test->id;
			});
		}

		return $stageTest !== null;

	}

	/**
	 * Obtain stage test score of the specified test
	 * @return float
	 */
	public function getTestScore($test = null) {

		$score = 0;

		if ($test) {
			$stageTest = $this->tests->first(function ($stageTest) use ($test) {
				return $stageTest->test_id === $test->id;
			});

			if ($stageTest) {
				$score = $stageTest->computeScore();
			}
		}

		return $score;

	}

	/**
	 * Check if applicant has pass the stage
	 * @param App\Model\Stage $stage
	 * @return boolean
	 */
	public function hasPass($stage = null) {
		//compute score
		$has_pass = $this->score >= $this->stage->passMark;

		if ($stage !== null) {
			$has_pass = $has_pass && ($this->stage_id === $stage->id) && $this->application->isCurrentStage($stage);
		}

		return $has_pass;
	}

	/**
	 * Check if provided user is application applicant
	 * @param  App\Models\User  $user
	 * @return boolean
	 */
	public function isApplicant($user = null) {
		$is_applicant = (is_set($user) && is_set($user->id)) ? ($user->id === $this->applicant_id) : false;
		return $is_applicant;
	}

	/**
	 * Check if current user can take test and stage has test
	 * @param  App\Models\User  $user
	 * @return boolean
	 */
	public function canTakeTest($user = null) {
		$can_take_test = $this->isApplicant($user) && $this->hasTest();
		return $can_take_test;
	}

	/**
	 * Get application associate with application stage
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function application() {
		return $this->belongsTo('App\Models\Application', 'application_id');
	}

	/**
	 * Get stage associate with application stage
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function stage() {
		return $this->belongsTo('App\Models\Stage', 'stage_id');
	}

	/**
	 * Get applicant associate with application stage
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function applicant() {
		return $this->belongsTo('App\Models\User', 'applicant_id');
	}

	/**
	 * Get organization associate application stage
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function organization() {
		return $this->belongsTo('App\Models\User', 'organization_id');
	}

	/**
	 * Get position associate with application stage
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function position() {
		return $this->belongsTo('App\Models\Position', 'position_id');
	}

	/**
	 * Get tests associate with application stage
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function tests() {
		return $this->hasMany('App\Models\StageTest', 'applicationstage_id');
	}

	/**
	 * Count total applicants on this stage
	 * @return int
	 */
	public static function totalApplied($position = null, $stage = null) {
		$total = ApplicationStage::where('position_id', $position->id)
			->where('stage_id', $stage->id)
			->count();

		if (!$total) {
			$total = 0;
		}

		return $total;
	}

	/**
	 * Count total passed applicants on application stage
	 * @return int
	 */
	public static function totalPassed($position = null, $stage = null) {
		$passed = ApplicationStage::where('position_id', $position->id)
			->where('stage_id', $stage->id)
			->where('score', '>=', $stage->passMark)->count();

		if (!$passed) {
			$passed = 0;
		}

		return $passed;
	}

	/**
	 * Count total failed applicants on application stage
	 * @return int
	 */
	public static function totalFailed($position = null, $stage = null) {
		$failed = ApplicationStage::where('position_id', $position->id)
			->where('stage_id', $stage->id)
			->where('score', '>', 0)
			->where('score', '<', $stage->passMark)
			->count();

		if (!$failed) {
			$failed = 0;
		}

		return $failed;
	}

	/**
	 * Count total unreviewed applicants on application stage
	 * @return int
	 */
	public static function totalUnreviewed($position = null, $stage = null) {
		$unreviewed = ApplicationStage::where('position_id', $position->id)
			->where('stage_id', $stage->id)
			->where('score', '<=', 0)
			->count();

		if (!$unreviewed) {
			$unreviewed = 0;
		}

		return $unreviewed;
	}
}
