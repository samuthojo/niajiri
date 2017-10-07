<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Organization
 * @package App\Models
 * @version October 7, 2017, 5:47 am UTC
 *
 * @property \App\Models\Media media
 * @property \App\Models\Sector sector
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Position
 * @property \Illuminate\Database\Eloquent\Collection Project
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 * @property string email
 * @property string mobile
 * @property string landline
 * @property string fax
 * @property string physical_address
 * @property string postal_address
 * @property string logo
 * @property string sector_id
 */
class Organization extends Model
{
    use SoftDeletes;

    /**
     * Allow user to have attached files(media) i.e avatar etc
     */
    use HasMediaTrait;

    public $table = 'organizations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'mobile',
        'landline',
        'fax',
        'physical_address',
        'postal_address',
        'website',
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
        'name' => 'string',
        'email' => 'string',
        'mobile' => 'string',
        'landline' => 'string',
        'fax' => 'string',
        'website' => 'string',
        'physical_address' => 'string',
        'postal_address' => 'string',
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
     * Build user avatar url
     */
    public function logo() {
        //default user avatar
        $avatar = url('/images/avatar.jpg');

        //try obtain custom uploaded avatar
        $media = $this->media()->first();
        if ($media) {
            $avatar = asset('storage/' . $media->id . '/' . $media->file_name);
        }
        return $avatar;
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
