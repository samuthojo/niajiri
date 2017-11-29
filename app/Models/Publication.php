<?php

namespace App\Models;

use App\Models\Base as Model;

class Publication extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applicant_publications';

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
        'title', 'publisher',
        'published_at', 'summary', 'applicant_id','project_id',
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
        'published_at' => 'date',
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
            'applicant_publication.title' => 10,
            'applicant_publication.publisher' => 10,
            'applicant_publication.summary' => 5,
        ],
    ];


    /**
     * Get applicant associate with publication
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id');
    }

}
