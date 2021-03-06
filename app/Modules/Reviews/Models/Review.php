<?php

namespace App\Modules\Reviews\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

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
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note',
        'comment',
        'user_id'

    ];

    public function medias()
    {
        return $this->hasMany('App\Modules\General\Models\Media','review_id');
    }

    public function reviewer(){

        return $this->belongsTo('App\Modules\User\Models\User','user_id');
    }

     public function reviewed(){

        return $this->morphTo();
    }

}
