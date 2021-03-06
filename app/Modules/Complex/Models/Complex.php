<?php

namespace App\Modules\Complex\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Complex extends Model
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
    protected $table = 'complex';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'view_count',
        'email',
        'web_site',
        'address_id',
        'user_id',
        'installation_id'
    ];

    public function medias()
    {
        return $this->hasMany('App\Modules\General\Models\Media', 'complex_id');
    }

    public function terrains()
    {

        return $this->hasMany('App\Modules\Complex\Models\Terrain', 'complex_id');

    }

    public function categories()
    {

        return $this->hasMany('App\Modules\Complex\Models\ComplexCategory', 'complex_id');

    }


    public function reviews()
    {

        return $this->morphMany('App\Modules\Reviews\Models\Review', 'reviewed');
    }

    public function reports()
    {

        return $this->morphMany('App\Modules\Reviews\Models\Report', 'reported');
    }

    public function infrastructure()
    {

        return $this->hasOne('App\Modules\Complex\Models\Infrastructure', 'complex_id', 'id');
    }


    public function address()
    {

        return $this->hasOne('App\Modules\General\Models\Address', 'id', 'address_id');
    }

    public function wishlists()
    {

        return $this->morphMany('App\Modules\Reviews\Models\Wishlist', 'wished');
    }

    public function schedules()
    {
        return $this->morphMany('App\Modules\Infrastructure\Models\ComplexSchedule', 'group');
    }

    public function owner()
    {
        return $this->belongsTo('App\Modules\User\Models\User');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function status() {
        return $this->belongsTo('App\Modules\Complex\Models\ComplexRequest');
    }
}
