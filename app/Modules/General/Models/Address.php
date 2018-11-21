<?php

namespace App\Modules\General\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

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
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'postal_code',
        'country',
        'locality',
        'address',
        'latitude',
        'longitude',
        'description'
    ];

}
