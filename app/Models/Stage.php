<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Stage
 * @package App\Models
 * @version October 9, 2017, 4:58 pm UTC
 *
 * @property \App\Models\Position position
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection Test
 * @property string name
 * @property string activities
 * @property integer number
 * @property date startedAt
 * @property date endedAt
 * @property decimal passMark
 * @property string position_id
 */
class Stage extends Model
{
    use SoftDeletes;

    public $table = 'stages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'activities',
        'number',
        'startedAt',
        'endedAt',
        'passMark',
        'hasTest',
        'position_id'
    ];


    protected static function boot()
  	{
  	    parent::boot();
  	    static::addGlobalScope('orderStageNumber', function(Builder $builder) {
  	        $builder->orderby('number', 'asc');
  	    });

    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'activities' => 'string',
        'number' => 'integer',
        'startedAt' => 'date',
        'endedAt' => 'date',
        'hasTest' => 'boolean',
        'passMark' => 'double',
        'position_id' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function position()
    {
        return $this->belongsTo(\App\Models\Position::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tests()
    {
        return $this->hasMany(\App\Models\Test::class);
    }
}
