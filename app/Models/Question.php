<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class Question extends Model
{
    use SoftDeletes;

    public $table = 'questions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'label',
        'firstChoice',
        'secondChoice',
        'thirdChoice',
        'fourthChoice',
        'fifthChoice',
        'correct',
        'weight',
        'test_id'
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
        'test_id' => 'string'
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
    public function test()
    {
        return $this->belongsTo(\App\Models\Test::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionAttempts()
    {
        return $this->hasMany(\App\Models\QuestionAttempt::class);
    }
}
