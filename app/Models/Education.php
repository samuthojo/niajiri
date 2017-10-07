<?php

namespace App\Models;

use App\Models\Base as Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Education extends Model implements HasMedia 
{

    /**
     * Allow eduaction to have attached files(media) i.e certificates etc
     */
    use HasMediaTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applicant_educations';

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
        'level', 'institution', 'summary',
        'started_at', 'finished_at',
        'remark', 'applicant_id'
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
        'started_at' => 'date',
        'finished_at' => 'date',
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
            'applicant_educations.level' => 10,
            'applicant_educations.institution' => 10,
            'applicant_educations.summary' => 5,
            'applicant_educations.remark' => 10,
        ],
    ];


    /**
     * Build education attachement url
     */
    public function attachement() {
        //TODO default education attachement
        $attachement;

        //try obtain custom uploaded attachement
        $media = $this->getMedia('attachements')->first();
        if ($media) {
            $attachement = asset('storage/' . $media->id . '/' . $media->file_name);
        }
        return $attachement;
    }


    /**
     * Get applicant associate with education
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id');
    }

}
