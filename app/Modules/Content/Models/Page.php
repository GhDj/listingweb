<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

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
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'status',
        'user_id'
    ];

    public function posts()
    {
        return $this->hasMany('App\Modules\Content\Models\Post','page_id');
    }

    public function user(){

        return $this->belongsTo('App\Modules\User\Models\User');
    }




}
