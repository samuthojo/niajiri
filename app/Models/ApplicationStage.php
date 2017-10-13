<?php

namespace App\Models;

use App\Models\Base as Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Carbon\Carbon;

class ApplicationStage extends Model implements HasMedia 
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
    protected $table = 'application_stages';

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
        'score', 'comment',
        'application_id','stage_id',
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
     * Get application associate with application stage
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }


    /**
     * Get stage associate with application stage
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stage()
    {
        return $this->belongsTo('App\Models\Stage', 'stage_id');
    }


    /**
     * Get applicant associate with application stage
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id');
    }


    /**
     * Get organization associate application stage
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo('App\Models\User', 'organization_id');
    }


    /**
     * Get position associate with application stage
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id');
    }

}
