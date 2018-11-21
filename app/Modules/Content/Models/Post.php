<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

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
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'status',
        'page_id',
        'user_id'
    ];

    public function medias(){

        return $this->hasMany('App\Modules\General\Models\Media','post_id');
    }

    public function page()
    {
        return $this->belongsTo('App\Modules\General\Content\Page');

    }

    public function user(){

        return $this->belongsTo('App\Modules\User\Models\User');
    }



}
