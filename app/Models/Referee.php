<?php

namespace App\Models;

use App\Models\Base as Model;

class Referee extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applicant_referees';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'organization',
        'email', 'mobile', 'alternative_mobile',
        'applicant_id','project_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'applicant_referees.name' => 10,
            'applicant_referees.title' => 10,
            'applicant_referees.organization' => 10,
            'applicant_referees.email' => 10,
            'applicant_referees.mobile' => 10,
            'applicant_referees.alternative_mobile' => 10,
        ],
    ];


    /**
     * Get applicant associate with referee
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id')->withTrashed();
    }

}
