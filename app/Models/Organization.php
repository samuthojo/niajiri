<?php

namespace App\Models;

class Organization extends Base
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'logo', 'sector_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];


  /**
   * [projects description]
   * @return [type] [description]
   */

  public function projects()
  {
    return $this->hasMany('App\Models\Project', 'organization_id');
  }


  /**
   * [sector description]
   * @return [type] [description]
   */
  public function sector()
  {
    return $this->belongsTo('App\Models\Sector', 'sector_id');
  }


  public function positions()
  {

    return $this->hasMany('App\Models\Position', 'organization_id');

  }


  public function logo()
  {
     return $this->hasOne('App\Models\Media');
  }


}
