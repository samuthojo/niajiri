<?php

namespace App\Models;

use App\Models\Base as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Question
 * @package App\Models
 * @version October 9, 2017, 5:00 pm UTC
 *
 * @property \App\Models\Test test
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection QuestionAttempt
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection tests
 * @property string label
 * @property string firstChoice
 * @property string secondChoice
 * @property string thirdChoice
 * @property string fourthChoice
 * @property string fifthChoice
 * @property string correct
 * @property decimal weight
 * @property string test_id
 */
class Question extends Model implements HasMedia {

	/**
	 * Allow question to have attached files(mostly image)
	 */
	use HasMediaTrait;

	use SoftDeletes;

	public $table = 'questions';

	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $dates = ['deleted_at'];

	/**
	 * Relations to eager load
	 */
	protected $withables = [
		'test',
	];

	public $fillable = [
		'label',
		'firstChoice',
		'secondChoice',
		'thirdChoice',
		'fourthChoice',
		'fifthChoice',
		'correct',
		'weight',
		'test_id',
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'string',
		'label' => 'string',
		'firstChoice' => 'string',
		'secondChoice' => 'string',
		'thirdChoice' => 'string',
		'fourthChoice' => 'string',
		'fifthChoice' => 'string',
		'correct' => 'string',
		'test_id' => 'string',
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
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [

	];

	/**
	 * Clone current question as new question
	 * @return App\Models\Question
	 */
	public function copyInto($copier = []) {

		return \DB::transaction(function () use ($copier) {

			//dont copy
			if (empty($copier) && !array_has('test_id')) {
				return null;
			}

			//continue with copying
			else {
				$finder = array_merge(['label' => $this->label], $copier);
				$creator = array_merge([
					'label' => $this->label,
					'firstChoice' => $this->firstChoice,
					'secondChoice' => $this->secondChoice,
					'thirdChoice' => $this->thirdChoice,
					'fourthChoice' => $this->fourthChoice,
					'fifthChoice' => $this->fifth,
					'correct' => $this->correct,
				], $copier);

				//TODO ensure question has not attempt??
				$question = Question::updateOrCreate($finder, $creator);

				return $question;
			}

		});

	}

	/**
	 * Build question attachment
	 */
	public function attachment() {
		//default question attachment
		$attachment = null;

		//try obtain custom uploaded attachment
		$media = $this->getMedia('attachments')->first();
		if ($media) {
			$attachment = $media;
		}

		return $attachment;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 **/
	public function test() {
		return $this->belongsTo(\App\Models\Test::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
	public function questionAttempts() {
		return $this->hasMany(\App\Models\QuestionAttempt::class);
	}

	/**
	 * Prepare question choices
	 * @return array
	 */
	public function choices() {

		$choices = collect([]);

		if (is_set($this->firstChoice)) {
			$choices->push([ //first choice
				'name' => 'attempts[' . $this->id . ']',
				'value' => $this->firstChoice,
				'id' => snake_case($this->firstChoice),
			]);
		}

		if (is_set($this->secondChoice)) {
			$choices->push([ //second choice
				'name' => 'attempts[' . $this->id . ']',
				'value' => $this->secondChoice,
				'id' => snake_case($this->secondChoice),
			]);
		}

		if (is_set($this->thirdChoice)) {
			$choices->push([ //third choice
				'name' => 'attempts[' . $this->id . ']',
				'value' => $this->thirdChoice,
				'id' => snake_case($this->thirdChoice),
			]);
		}

		if (is_set($this->fourthChoice)) {
			$choices->push([ //fourth choice
				'name' => 'attempts[' . $this->id . ']',
				'value' => $this->fourthChoice,
				'id' => snake_case($this->fourthChoice),
			]);
		}

		if (is_set($this->fifthChoice)) {
			$choices->push([ //fifth choice
				'name' => 'attempts[' . $this->id . ']',
				'value' => $this->fifthChoice,
				'id' => snake_case($this->fifthChoice),
			]);
		}

		$choices = $choices->shuffle()->values();

		return $choices;
	}
}
