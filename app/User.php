<?php

namespace App;

use Alsofronie\Uuid\UuidModelTrait;
use App\Traits\ActAsEmployer;
use App\Traits\ActAsMember;
use App\Traits\Countable;
use App\Traits\Sugarize;
use App\Traits\Withable;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Userextends Authenticatable implements AuditableContract, HasMedia {
    use Notifiable;

    /**
     * Use Uuid as primary key
     */
    use UuidModelTrait;

    /**
     * Enable user to be searchable
     */
    use SearchableTrait;

    /**
     * give user roles and permissions
     */
    use EntrustUserTrait {
        restore as _restore;
    }

    /**
     * Make user auditable
     */
    use Auditable;

    /**
     * Allow user to have attached files(media) i.e avatar etc
     */
    use HasMediaTrait;

    /**
     * Provide access to form accessor
     */
    use FormAccessible;

    /**
     * Make user act as a member
     * @see App\Traits\ActAsAMember
     */
    use ActAsMember;

    /**
     * Make user act as a employer
     * @see App\Traits\ActAsEmployer
     */
    use ActAsEmployer;

    /**
     * Make model to eager load defined relations
     * @see App\Traits\Withable
     */
    use Withable;

    /**
     * Extend model query builder with english words
     * @see App\Traits\Sugarize
     */
    use Sugarize;

    /**
     * Make a model filterable
     * @see EloquentFilter\Filterable;
     */
    use Filterable;

    /**
     * Do not actually remove the model from the database.
     */
    use SoftDeletes {
        restore as __restore;
    }

    /**
     * Scope a query with field to count
     */
    use Countable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Override parent(s) restores
     */
    public function restore() {
        $this->_restore();
        $this->__restore();
    }

}
