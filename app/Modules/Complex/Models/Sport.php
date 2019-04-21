<?php

namespace App\Modules\Complex\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model {

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
    protected $table = 'sports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];


    public function terrains(){

        return $this->hasMany('App\Modules\Complex\Models\Terrain','speciality_id');

    }


    public function teams(){

        return $this->hasMany('App\Modules\Infrastructure\Models\Team','speciality_id');
    }

    public function categories()
    {
        return $this->hasMany(SportCategory::class,'sport_id','id');
    }
}
