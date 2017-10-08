<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models
 * @version October 6, 2017, 2:05 am UTC
 *
 * @property \App\Models\Organization organization
 * @property \Illuminate\Database\Eloquent\Collection organizations
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Position
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 * @property date startedAt
 * @property date endedAt
 * @property string organization_id
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'startedAt',
        'endedAt',
        'organization_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'startedAt' => 'date',
        'endedAt' => 'date',
        'organization_id' => 'string'
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
    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function positions()
    {
        return $this->hasMany(\App\Models\Position::class);
    }
}
