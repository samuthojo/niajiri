<?php

namespace App\Models;

class Project extends Base
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'organization_id', 'name', 'startedAt', 'endedAt'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

}
