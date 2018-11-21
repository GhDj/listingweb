<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model {

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
    protected $table = 'ads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place',
        'status',
        'media_id'
    ];

    public function media(){

        return $this->hasOne('App\Modules\General\Models\Media','id','media_id');
    }



}
