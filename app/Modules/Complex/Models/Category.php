<?php

namespace App\Modules\Complex\Models;

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
        'title',
    ];

    public function terrains()
    {
        return $this->hasMany('App\Modules\Complex\Models\Terrain','category_id','id');
    }

}
