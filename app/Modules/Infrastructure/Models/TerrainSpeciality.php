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
        'speciality',
        'terrain_id'
    ];



}

