<?php

namespace App\Modules\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
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
  protected $table = 'teams';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'level',
    'speciality_id',
    'club_id',
  ];

  public function medias()
  {
      return $this->hasMany('App\Modules\General\Models\Media','team_id');
  }

  public function speciality(){

      return $this->belongsTo('App\Modules\Infrastructures\Models\TerrainSpeciality');

  }

  public function club(){

      return $this->belongsTo('App\Modules\Infrastructures\Models\Club');

  }

  function getLevelAttribute($level){
    $teamLevel = array('Devision 1', 'Devision 2', 'Devision 3');
    return $teamLevel[$level-1];
  }

}
