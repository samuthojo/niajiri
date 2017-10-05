<?php

namespace App;

use Alsofronie\Uuid\UuidModelTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\Media as SpatieMedia;

class Media extends SpatieMedia
{
    /**
     * Use Uuid as primary key
     */
    use UuidModelTrait;

    /**
     * Enable model to be searchable
     */
    use SearchableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medias';

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
        'collection_name', 'name', 'file_name',
        'mime_type', 'disk', 'size',
        'manipulations', 'custom_properties', 'order_column',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'manipulations' => 'array',
        'custom_properties' => 'array',
    ];

    /**
     * Generate video embeded content
     * @param  [array] $options [description]
     * @return [type]          [description]
     */
    public function embeded($options = null)
    {
        $embeded = null;

        if ($this->collection_name == 'videos') {
            $embed = \Embed::make($this->file_name)->parseUrl();
            if ($embed) {
                $embeded = $embed->getHtml();
            }
        }

        return $embeded;
    }

    /**
     * Obtain media public url
     * @return [String] [description]
     */
    public function public_url()
    {
        $public_url = asset('storage/' . $this->id . '/' . $this->file_name);
        return $public_url;
    }

}
