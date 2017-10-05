<?php

namespace App\Models;


class Position extends Base
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'sector_id', 'project_id', 'organization_id', 'title', 'summary', 'responsibilities',
      'requirements','duration','dueAt', 'publishedAt'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * [project description]
   * @return [type] [description]
   */
  public function project()
  {
    return $this->belongsTo('App\Models\Project','project_id');
  }

  /**
   * [sector description]
   * @return [type] [description]
   */
  public function sector()
  {
     return $this->belongsTo('App\Models\Sector', 'sector_id');
  }

  /**
   * [organization description]
   * @return [type] [description]
   */
  public function organization()
  {
    return $this->belongsTo('App\Models\Organization', 'organization_id');
  }

}
