<?php

namespace App\Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model {

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
    protected $table = 'promo_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promo_code',
        'status',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo('App\Modules\User\Models\User','user_id','id');
    }

}


