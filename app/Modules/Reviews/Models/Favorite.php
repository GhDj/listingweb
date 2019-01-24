<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'favorites';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id',
      'terrain_id',
      'club_id'
  ];

}
