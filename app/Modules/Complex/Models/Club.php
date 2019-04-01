<?php

namespace App\Modules\Complex\Models;

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
          'address',
          'phone',
          'email',
          'web_site',
          'description',
          'logo',
          'sports'
      ];

      public function medias()
      {
          return $this->hasMany('App\Modules\General\Models\Media','club_id');
      }


      public function teams()
      {
          return $this->hasMany('App\Modules\Infrastructure\Models\Team','club_id');
      }

      public function wishlists(){

          return $this->morphMany('App\Modules\Reviews\Models\Wishlist','wished');
      }



}
