<?php

namespace App\Modules\Message\Models;

use Illuminate\Database\Eloquent\Model;

class MessageUser extends Model {

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
    protected $table = 'message_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'sender_id',
        'receiver_id'
    ];

    public function messages()
    {
        return $this->hasMany('App\Modules\Message\Models\Message', 'message_user_id', 'id');
    }

    public function messageSender()
    {
        return $this->hasOne('App\Modules\User\Models\User', 'id', 'sender_id');
    }

    public function messageReceiver()
    {
        return $this->hasOne('App\Modules\User\Models\User', 'id', 'receiver_id');
    }


}


