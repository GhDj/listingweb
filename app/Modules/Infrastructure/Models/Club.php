<?php

namespace App\Modules\Infrastructures\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
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
      protected $table = 'clubs';

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
        'name',
        'description',
        'terrain_id'
      ];

      public function medias()
      {
          return $this->hasMany('App\Modules\General\Models\Media','club_id');
      }

      public function terrain(){

          return $this->belongsTo('App\Modules\Infrastructures\Models\Terrain');
      }

      public function teams()
      {
          return $this->hasMany('App\Modules\Infrastructure\Models\Team','club_id');
      }

      public function wishlists(){

          return $this->morphMany('App\Modules\Reviews\Models\Wishlist','wished');
      }



}
