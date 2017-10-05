<?php

namespace App\Models;

use App\Models\Base as Model;

/**
 * Class Organization
 * @package App\Models
 * @version October 5, 2017, 7:49 pm UTC
 *
 * @property \App\Models\Media media
 * @property \App\Models\Sector sector
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Position
 * @property \Illuminate\Database\Eloquent\Collection Project
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string logo
 * @property string sector_id
 */
class Organization extends Model
{

    public $table = 'organizations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'logo',
        'sector_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'logo' => 'string',
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
    public function media()
    {
        return $this->belongsTo(\App\Models\Media::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sector()
    {
        return $this->belongsTo(\App\Models\Sector::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function positions()
    {
        return $this->hasMany(\App\Models\Position::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class);
    }
}
