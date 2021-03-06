<?php

namespace App\Modules\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
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
    protected $table = 'notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'code',
        'target',
        'status',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo('App\Modules\User\Models\User');
    }
}
