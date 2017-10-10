<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
 * @property string test_category_id
 */
class Test extends Model
{
    use SoftDeletes;

    public $table = 'tests';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'duration',
        'stage_id',
        'test_category_id'
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'stage_id' => 'string',
        'test_category_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stage()
    {
        return $this->belongsTo(\App\Models\Stage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function testCategory()
    {
        return $this->belongsTo(\App\Models\TestCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionAttempts()
    {
        return $this->hasMany(\App\Models\QuestionAttempt::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class);
    }
}
