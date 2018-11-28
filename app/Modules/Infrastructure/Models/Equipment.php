<?php

namespace App\Modules\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {

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
    protected $table = 'equipments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'terrain_id'
    ];

    public function medias()
    {
        return $this->hasMany('App\Modules\General\Models\Media','equipment_id');
    }

    public function terrain(){

        return $this->belongsTo('App\Modules\Infrastructures\Models\Terrain');
    }

    public function reviews(){

        return $this->morphMany('App\Modules\Reviews\Models\Review','reviewed');
    }

    public function reports(){

        return $this->morphMany('App\Modules\Reviews\Models\Report','reported');
    }


}

