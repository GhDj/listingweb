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
          'address_id',
          'phone',
          'email',
          'web_site',
          'description',
          'logo',
          'user_id',
          'terrain_id'
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

      public function terrain() {
          return $this->belongsTo('App\Modules\Complex\Models\Terrain','terrain_id');
      }

      public function status() {
          return $this->hasOne('App\Modules\Complex\Models\ClubRequest','club_id','id');
      }

    public function address() {
        return $this->hasOne('App\Modules\General\Models\Address','id','address_id');
    }

      public function user() {
          return $this->belongsTo('App\Modules\User\Models\User','user_id');
      }

    public function reviews()
    {
        return $this->morphMany('App\Modules\Reviews\Models\Review', 'reviewed');
    }

    public function sports()
    {
        return $this->hasMany('App\Modules\Complex\Models\ClubSport', 'club_id');

    }

}
