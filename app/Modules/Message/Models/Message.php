<?php

namespace App\Modules\Message\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

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
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'status',
        'message_user_id',
        'user_id'
    ];

    public function messageUser()
    {
        return $this->hasOne('App\Modules\Message\Models\MessageUser', 'id', 'message_user_id');
    }

    public function user()
    {
        return $this->hasOne('App\Modules\User\Models\User', 'id', 'user_id');
    }


}


