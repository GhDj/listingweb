<?php

namespace App\Modules\Reviews\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {

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
    protected $table = 'reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'reported_id',
        'reported_type',
        'user_id'

    ];

    public function medias()
    {
        return $this->hasMany('App\Modules\General\Models\Media','report_id');
    }


}
