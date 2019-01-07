<?php

namespace App\Modules\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model {

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
    protected $table = 'complexes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'web_site',
        'address_id'
    ];

    public function medias()
    {
        return $this->hasMany('App\Modules\General\Models\Media','complex_id');
    }

    public function terrains(){

        return $this->hasMany('App\Modules\Infrastructures\Models\Terrain','complex_id');

    }

    public function categories(){

        return $this->hasMany('App\Modules\Infrastructures\Models\Category','complex_id');

    }

    public function reviews(){

        return $this->morphMany('App\Modules\Reviews\Models\Review','reviewed');
    }

    public function reports(){

        return $this->morphMany('App\Modules\Reviews\Models\Report','reported');
    }


    public function address(){

        return $this->hasOne('App\Modules\General\Models\Address', 'id', 'address_id');
    }
    public function wishlists(){

        return $this->morphMany('App\Modules\Reviews\Models\Wishlist','wished');
    }

      public function schedules(){
          return $this->morphMany('App\Modules\Infrastructure\Models\ComplexSchedule','group');
      }
}
