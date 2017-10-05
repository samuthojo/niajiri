<?php

namespace App;

use Alsofronie\Uuid\UuidModelTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
     * Use Uuid as primary key
     */
    use UuidModelTrait;

    /**
     * Enable permission to be searchable
     */
    use SearchableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
        'name', 'resource',
        'display_name', 'description',
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
            'permissions.name' => 10,
            'permissions.resource' => 10,
            'permissions.display_name' => 10,
            'permissions.description' => 5,
        ],
    ];

}
