<?php

namespace App\Modules\General\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

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
    protected $table = 'medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'link',
        'review_id',
        'terrain_id',
        'equipment_id',
        'complex_id',
        'report_id',
        'post_id',
        'product_id',
        'team_id',
        'user_id',
        'status'
    ];

    function getLinkAttribute($link){
        return asset($link);
    }

    public function terrain() {
        return $this->belongsTo('App\Modules\Complex\Models\Terrain');
    }

    public function category() {
        return $this->belongsTo('App\Modules\Complex\Models\Category');
    }

    public function review() {
        return $this->belongsTo('App\Modules\Reviews\Models\Review');
    }

    public function post() {
        return $this->belongsTo('App\Modules\Content\Models\Post');
    }

    public function club() {
        return $this->belongsTo('App\Modules\Complex\Models\Club');
    }

    public function user() {
        return $this->belongsTo('App\Modules\User\Models\User');
    }

}
