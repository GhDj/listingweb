<?php

namespace App\Modules\Complex\Models;

use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
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
    protected $table = 'terrains';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'height',
        'length',
        'width',
        'lighting',
        'terrain_nature',
        'soil_type',
        'video_recorder',
        'description',
        'complex_id',
        'category_id',
        'sport_id'
    ];

    public function medias()
    {
        return $this->hasMany('App\Modules\General\Models\Media', 'terrain_id');
    }

    public function complex()
    {

        return $this->belongsTo('App\Modules\Complex\Models\Complex');
    }

    public function sport()
    {

        return $this->belongsTo('App\Modules\Complex\Models\Sport');

    }

    public function category()
    {

        return $this->belongsTo('App\Modules\Complex\Models\Category');
    }

    public function reviews()
    {

        return $this->morphMany('App\Modules\Reviews\Models\Review', 'reviewed');
    }


    public function reports()
    {

        return $this->morphMany('App\Modules\Reviews\Models\Report', 'reported');
    }

    public function wishlists()
    {

        return $this->morphMany('App\Modules\Reviews\Models\Wishlist', 'wished');
    }

    public function schedules()
    {
        return $this->morphMany('App\Modules\Complex\Models\ComplexSchedule', 'group');
    }

    public function clubs()
    {
        return $this->hasMany('App\Modules\Complex\Models\Club', 'terrain_id');
    }

    public function getSizeTerrain($id)
    {
        $terrain = Terrain::find($id);
        return $terrain->longueur * $terrain->largueur;
    }

    public function activities()
    {
        return $this->hasMany('App\Modules\Complex\Models\TerrainActivity', 'terrain_id');
    }
}
