<?php

namespace App\Modules\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class ComplexSchedule extends Model {

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
    protected $table = 'complex_schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

       protected $fillable = [
           'start_at',
           'ends_at',
           'day',
           'horaire_id',
           'horaire_type'
       ];

       public function time(){
           return $this->morphTo();
       }

}
