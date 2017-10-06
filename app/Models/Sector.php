<?php

namespace App\Models;

use App\Models\Base as Model;

/**
 * Class Sector
 * @package App\Models
 * @version October 5, 2017, 7:45 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Organization
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Position
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 */
class Sector extends Model
{

    public $table = 'sectors';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function organizations()
    {
        return $this->hasMany(\App\Models\Organization::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function positions()
    {
        return $this->hasMany(\App\Models\Position::class);
    }
}
