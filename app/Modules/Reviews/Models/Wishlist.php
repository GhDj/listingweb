<?php

namespace App\Modules\Reviews\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model {

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
    protected $table = 'wishlists';

    protected $fillable = [
        'wished_id',
        'wished_type',
        'user_id'

    ];


    public function wisher(){

        return $this->belongsTo('App\Modules\User\Models\User');
    }

}
