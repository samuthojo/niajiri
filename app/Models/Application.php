<?php

namespace App\Models;

use App\Models\Base as Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Carbon\Carbon;

class Application extends Model implements HasMedia 
{

    /**
     * Allow application to have attached files(media) i.e cover letter etc
     */
    use HasMediaTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Relations to eager load
     */
    protected $withables = [
        'applicant',
        'organization',
        'position',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_id', 'organization_id', 'position_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime', //used as application date
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
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
        ],
    ];

    /**
     * Get and format the achievement's finished_at for forms.
     *
     * @param  string  $value
     * @return string
     * @see https://laravelcollective.com/docs/5.4/html#form-model-binding
     */
    public function formCreatedAtAttribute($value) {
        if (is_set($value)) {
            $value = Carbon::parse($value);
            $value = $value->format(config('app.datepicker_parse_format'));
        }
        return $value;
    }

    /**
     * Check if provided user is an applicant for this application
     * @param  App\Models\User  $user
     * @return boolean
     */
    public function isApplicant($user = null)
    {
        if(is_set($user)){
            return $this->applicant_id === $user->id;
        }

        return false;
    }


    /**
     * Build application cover_letter url
     */
    public function coverLetter() {
        //TODO default application cover_letter
        $cover_letter;

        //try obtain custom uploaded cover_letter
        $media = $this->getMedia('cover_letters')->first();
        if ($media) {
            $cover_letter = asset('storage/' . $media->id . '/' . $media->file_name);
        }
        return $cover_letter;
    }


    /**
     * Get applicant associate with application
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id');
    }


    /**
     * Get organization associate with application
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo('App\Models\User', 'organization_id');
    }


    /**
     * Get position associate with application
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id');
    }

}
