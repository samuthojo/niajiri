<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use OwenIt\Auditing\Models\Audit as AuditModel;
use Watson\Rememberable\Rememberable;

/**
 * Application base model
 */
class Audit extends AuditModel
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
     * Use query caching
     */
    use Rememberable;

}
