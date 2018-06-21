<?php

namespace App\Models;

use App\Mail\StageAccepted;
use App\Mail\StageNotify;
use App\Mail\StageRejected;
use App\Models\ApplicationStage;
use App\Models\Base as Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Application extends Model implements HasMedia {

	/**
	 * Allow application to have attached files(media) i.e cover letter etc
	 */
	use HasMediaTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'applications';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Relations to eager load
	 */
	protected $withables = [
		'applicant',
		'organization',
		'position',
		'stages',
		'stage',
	];

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'applicant_id', 'organization_id',
		'position_id', 'stage_id',
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
		],
	];

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
	 * Check if provided user is an applicant for this application
	 * @param  App\Models\User  $user
	 * @return boolean
	 */
	public function isApplicant($user = null) {
		if (is_set($user)) {
			return $this->applicant_id === $user->id;
		}

		return false;
	}

	/**
	 * Check if provided position stage is current application stage
	 * @param  App\Models\Stage  $stage
	 * @return boolean
	 */
	public function isCurrentStage($stage = null) {
		if (is_set($stage)) {
			return $this->stage_id === $stage->id;
		}

		return false;
	}

	/**
	 * Check if application in current stage can advance in next stage
	 * @param  App\Models\Stage $stage
	 * @return boolean
	 */
	public function canAdvance($stage = null) {
		$can_advance = $this->isCurrentStage($stage);
		return $can_advance;
	}

	/**
	 * Build application cover_letter url
	 */
	public function coverLetter() {
		//default application cover_letter
		$cover_letter = null;

		//try obtain custom uploaded cover_letter
		$media = $this->getMedia('cover_letters')->first();
		if ($media) {
			$cover_letter = $media;
		}
		return $cover_letter;
	}

	/**
	 * Get applicant associate with application
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function applicant() {
		return $this->belongsTo('App\Models\User', 'applicant_id')->withTrashed();
	}

	/**
	 * Get organization associate with application
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function organization() {
		return $this->belongsTo('App\Models\User', 'organization_id')->withTrashed();
	}

	/**
	 * Get position associate with application
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function position() {
		return $this->belongsTo('App\Models\Position', 'position_id');
	}

	/**
	 * Get current stage associate with application
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function stage() {
		return $this->belongsTo('App\Models\Stage', 'stage_id');
	}

	/**
	 * Get the application stages
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function stages() {
		return $this->hasMany('App\Models\ApplicationStage', 'application_id');
	}

	/**
	 * Advance application to next stage
	 * @return App\Model\Application
	 */
	public function advance($score = false) {
		//TODO wrap in transaction
		//TODO compute latest stage score

		//1. get current stage
		$currentStage = $this->stage;
		$nextStage = null;

		//2. obtain application next stage
		$nextStage = ($currentStage === null) ? $this->position->firstStage() : $this->position->nextStage($currentStage);

		//TODO ensure next stage is not null

		//2.1 check if autoscoring is allowed
		if ($score) {
			//3.0 score existing application stage(if not yet)
			$currentApplicationStage = ApplicationStage::query()->where([
				'application_id' => $this->id,
				'position_id' => $this->position_id,
				'stage_id' => $currentStage->id,
			])->first();

			//3.0.1 update current stage score using current stage passMark
			if ($currentApplicationStage && !$currentApplicationStage->score) {
				$currentApplicationStage->score = $currentStage->passMark;
				$currentApplicationStage->save();
			}
		}

		//3.1 obtain existing application stage(ensure next stage not exists)
		$applicationStage = ApplicationStage::query()->where([
			'application_id' => $this->id,
			'position_id' => $this->position_id,
			'stage_id' => $nextStage->id,
		])->first();

		//4. set application current stage
		$this->stage_id = $nextStage->id;
		$this->save();

		//5. advance application to next stage
		//TODO handle fail
		//TODO prevent advance to same stage
		//TODO handle last stage advancing
		if ($applicationStage === null) {
			$applicationStage = ApplicationStage::create([
				'application_id' => $this->id,
				'stage_id' => $nextStage->id,
				'applicant_id' => $this->applicant_id,
				'organization_id' => $this->organization_id,
				'position_id' => $this->position_id,
			]);

			//queue(send) mail to applicant to notify next stage
			// if (!$this->position->isFirstStage($nextStage)) {
			// 	Mail::to($applicationStage->applicant)
			// 		->queue(new StageAccepted($applicationStage));
			// }
		}

		//6. return current application
		return $this;

	}

	/**
	 * Reject application to next stage
	 * @return App\Model\ApplicationStage
	 */
	public function reject() {

		//score existing application stage(if not yet)
		$currentApplicationStage = ApplicationStage::query()->where([
			'application_id' => $this->id,
			'position_id' => $this->position_id,
			'stage_id' => $this->stage_id,
		])->first();

		//set score to zero to fail current application
		if ($currentApplicationStage && !$currentApplicationStage->score) {
			$currentApplicationStage->score = 0;
			$currentApplicationStage->save();
		}

		//persist application changes
		$this->save();

		//queue(send) mail to applicant to notify next stage
		// Mail::to($currentApplicationStage->applicant)
		// 	->queue(new StageRejected($currentApplicationStage));

		return $this;

	}

	/**
	 * Send notification to an application
	 * @return App\Model\Application
	 */
	public function notify($message = null) {
		//1.0 obtain current application stage
		$applicationStage = ApplicationStage::query()->where([
			'application_id' => $this->id,
			'position_id' => $this->position_id,
			'stage_id' => $this->stage_id,
		])->first();

		//2.0 queue(send) mail to applicant to notify
		// if ($applicationStage !== null) {
		// 	if (is_set($message)) {
		// 		Mail::to($applicationStage->applicant)
		// 			->queue(new StageNotify($applicationStage, $message));
		// 	}
		// }

		//3.0 return current application
		return $this;

	}

	/**
	 * Advances application(s) to next stage
	 * @param  collection  $ids application ids
	 * @return collection of App\Model\ApplicationStage
	 */
	public static function advances($ids = null, $reject = false) {

		//remove application empty ids
		$ids = $ids->reject(function ($id) {
			return empty($id);
		});

		//ensure unique
		$ids = $ids->unique();

		//TODO throw if no application ids

		// advance applications
		return \DB::transaction(function () use ($ids, $reject) {

			// 0. map ids to advance applications
			return $ids->map(function ($id) use ($reject) {

				//1. find existing application
				$application = Application::findOrFail($id);

				//TODO ensure applicant pass a stage

				//2. auto fail current stage and stope
				//application to advance to next stage
				if ($reject) {
					$application = $application->reject();
				}

				//2. auto score current stage and advance application
				// 	 to next stage
				else {
					$application = $application->advance(true);
				}

				//3. return advanced application
				return $application;

			});

		});

	}

	/**
	 * Send notification to applications with specified ids
	 * @param  collection  $ids application ids
	 * @return collection of App\Model\Application
	 */
	public static function notifies($ids = null, $message = null) {

		//remove application empty ids
		$ids = $ids->reject(function ($id) {
			return empty($id);
		});

		//ensure unique
		$ids = $ids->unique();

		//TODO throw if no application ids

		// notify applications
		return \DB::transaction(function () use ($ids, $message) {

			// 0. map ids to notify applications
			return $ids->map(function ($id) use ($message) {

				//1. find existing application
				$application = Application::findOrFail($id);

				//2. notify application
				$application = $application->notify($message);

				//3. return notified application
				return $application;

			});

		});

	}

}
