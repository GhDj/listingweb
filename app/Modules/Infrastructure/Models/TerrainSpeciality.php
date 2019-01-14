<?php

namespace App\Modules\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class TerrainSpeciality extends Model {

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
    protected $table = 'terrain_specialities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'speciality'
    ];


    public function terrains(){

        return $this->hasMany('App\Modules\Infrastructures\Models\Terrain','speciality_id');

    }

    public function equipments(){

        return $this->hasMany('App\Modules\Infrastructures\Models\Equipment','speciality_id');

    }
}
