<?php

namespace App\Models;

use App\Models\Base as Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Achievement extends Model implements HasMedia 
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
    protected $table = 'applicant_achievements';

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
        'title', 'organization', 'summary',
        'issued_at', 'applicant_id'
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
        'issued_at' => 'date',
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
            'applicant_achievements.title' => 10,
            'applicant_achievements.organization' => 10,
            'applicant_achievements.summary' => 5,
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
     * Get applicant associate with achievement
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id');
    }

}
