<?php

namespace App\Models;

use App\Models\Base as Model;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Achievement extends Model implements HasMediaConversions
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

    protected $parseFormat = 'm-Y';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'organization', 'summary',
        'issued_at', 'applicant_id', 'project_id',
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
     * Get and format the achievement's finished_at for forms.
     *
     * @param  string  $value
     * @return string
     * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
     */
    public function formIssuedAtAttribute($value) {
        if (is_set($value)) {
            $value = Carbon::parse($value);
            $value = $value->format(config('app.datepicker_parse_month_year_format'));
        }
        return $value;
    }


    /**
     * Build achievement attachment
     */
    public function attachment() {
        //default achievement attachment
        $attachment = null;

        //try obtain custom uploaded attachment
        $media = $this->getMedia('attachments')->first();
        if ($media) {
            $attachment = $media;
        }

        return $attachment;
    }


    /**
     * Get applicant associate with achievement
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id')->withTrashed();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(368)->height(232);
    }

}
