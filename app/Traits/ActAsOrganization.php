<?php

namespace App\Traits;

/**
 * Extends a user model with applicant abilities
 */
trait ActAsOrganization
{
    //------------------------------------------------------------
    //instance properties & methods
    //------------------------------------------------------------

    //------------------------------------------------------------
    //scope
    //------------------------------------------------------------

    //------------------------------------------------------------
    //relations
    //------------------------------------------------------------


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sector()
    {
        return $this->belongsTo(\App\Models\Sector::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function positions()
    {
        return $this->hasMany(\App\Models\Position::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class);
    }

    //------------------------------------------------------------
    //class properties & methods
    //------------------------------------------------------------
}
