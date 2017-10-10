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
    
    /**
     * Build organization logo url
     */
    public function logo()
    {
        return $this->avatar();
    }

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
        return $this->belongsTo(\App\Models\Sector::class, 'sector_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function positions()
    {
        return $this->hasMany(\App\Models\Position::class, 'organization_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class, 'organization_id');
    }

    //------------------------------------------------------------
    //class properties & methods
    //------------------------------------------------------------
}
