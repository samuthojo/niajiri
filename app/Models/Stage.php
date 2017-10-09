<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'position_id'
    ];

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
        'position_id' => 'string'
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
