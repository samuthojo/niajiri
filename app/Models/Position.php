<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Position
 * @package App\Models
 * @version October 6, 2017, 2:04 am UTC
 *
 * @property \App\Models\Organization organization
 * @property \App\Models\Project project
 * @property \App\Models\Sector sector
 * @property \Illuminate\Database\Eloquent\Collection organizations
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string title
 * @property string summary
 * @property string responsibilities
 * @property string requirements
 * @property string duration
 * @property date dueAt
 * @property date publishedAt
 * @property string project_id
 * @property string organization_id
 * @property string sector_id
 */
class Position extends Model
{
    use SoftDeletes;

    public $table = 'positions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'summary',
        'responsibilities',
        'requirements',
        'duration',
        'dueAt',
        'publishedAt',
        'project_id',
        'organization_id',
        'sector_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'title' => 'string',
        'summary' => 'longText',
        'responsibilities' => 'longText',
        'requirements' => 'longText',
        'duration' => 'string',
        'dueAt' => 'date',
        'publishedAt' => 'date',
        'project_id' => 'string',
        'organization_id' => 'string',
        'sector_id' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sector()
    {
        return $this->belongsTo(\App\Models\Sector::class);
    }
}
