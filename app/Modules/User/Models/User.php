<?php

namespace App\Modules\User\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'picture',
        'password',
        'validation',
        'phone',
        'gender',
        'promo_pts',
        'address_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            'App\Modules\User\Models\Role',
            'user_roles',
            'user_id',
            'role_id'
        )->withTimestamps();
    }

    public function assignRole($role){
        if(is_string($role)){
            $role = Role::where('id',$role)->get();
        }
        if(!$role) return false;
        $this->roles()->attach($role);
    }

    public function address(){
        return $this->hasOne('App\Modules\General\Models\Address', 'id', 'address_id');
    }

    public function reviews(){
        return $this->hasMany('App\Modules\Reviews\Models\Review','user_id');
    }

    public function reports(){
        return $this->hasMany('App\Modules\Reviews\Models\Report','user_id');
    }

    public function messages(){
        return $this->hasMany('App\Modules\Message\Models\Message');
    }

    public function notifications(){
        return $this->hasMany('App\Modules\General\Models\Notification','user_id','id');
    }

    public function wishlists(){
        return $this->hasMany('App\Modules\Reviews\Models\Wishlist','user_id');
    }

    function getPictureAttribute($picture){
      return asset($picture);
  }

  public function favoritesTerrains(){
      return $this->belongsToMany('App\Modules\Complex\Models\Terrain', 'favorites', 'user_id', 'terrain_id')->withTimeStamps();
  }

  public function favoritesClubs(){
      return $this->belongsToMany('App\Modules\Complex\Models\Club', 'favorites', 'user_id', 'club_id')->withTimeStamps();
  }

  public function Complexs(){
      return $this->hasMany('App\Modules\Complex\Models\Complex','user_id');
  }



}
