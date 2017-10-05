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

}
