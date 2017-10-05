<?php

namespace App\Models;

class Sector extends Base
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];


  public function organizations()
  {
    return $this->hasMany('App\Models\Organization', 'sector_id');
  }

  public function positions()
  {
    return $this->hasMany('App\Models\Position', 'sector_id');
  }
}
