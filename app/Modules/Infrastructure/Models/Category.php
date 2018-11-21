<?php

namespace App\Modules\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

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
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'complex_id'
    ];

    public function terrains(){

        return $this->hasMany('App\Modules\Infrastructures\Models\Terrain','category_id');

    }

}

