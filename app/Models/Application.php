<?php

namespace App\Models;

use App\Models\Base as Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Carbon\Carbon;
use App\Models\ApplicationStage;

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
        'stages',
        'stage'
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_id', 'organization_id', 
        'position_id', 'stage_id'
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
     * Check if provided position stage is current application stage
     * @param  App\Models\Stage  $stage
     * @return boolean
     */
    public function isCurrentStage($stage = null)
    {
        if(is_set($stage)){
            return $this->stage_id === $stage->id;
        }

        return false;
    }


    /**
     * Check if application in current stage can advance in next stage
     * @param  App\Models\Stage $stage
     * @return boolean
     */
    public function canAdvance($stage = null)
    {
        $can_advance = $this->isCurrentStage($stage) && !$this->position->isLastStage($stage);
        return $can_advance;
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

    /**
     * Get current stage associate with application
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stage()
    {
        return $this->belongsTo('App\Models\Stage', 'stage_id');
    }

    /**
     * Get the application stages
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stages()
    {
        return $this->hasMany('App\Models\ApplicationStage', 'application_id');
    }


    /**
     * Advance application to next stage
     * @return App\Modela\ApplicationStage
     */
    public function advance()
    {
        //TODO wrap in transaction
        
        //1. get current stage
        $currentStage = $this->stage;
        $nextStage = null;
        
        //2. obtain application next stage
        $nextStage = ($currentStage === null) ? $this->position->firstStage() : $this->position->nextStage($currentStage);
        //TODO ensure next stage is not null

        //3. obtain existing application stage(ensure next stage not exists)
        $applicationStage = ApplicationStage::query()->where([
                'application_id'=> $this->id,
                'position_id' => $this->position_id,
                'stage_id' => $nextStage->id
            ])->first();

        //4. set application current stage
        $this->stage_id = $nextStage->id;
        $this->save();

        //5. advance application to next stage
        if($applicationStage === null){
            $applicationStage = ApplicationStage::create([
                    'application_id' => $this->id,
                    'stage_id' => $nextStage->id,
                    'applicant_id' => $this->applicant_id, 
                    'organization_id' => $this->organization_id, 
                    'position_id' => $this->position_id
                ]);
            //TODO send mail to applicant to notify next stage
        }
        
        //6. return current application stage
        return $applicationStage;

    }

}
