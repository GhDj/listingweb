<?php

namespace App\Modules\Complex\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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
     * The attributes that types date.
     *
     * @var array
     */

     protected $dates = ['start_at','ends_at'];

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */

       protected $fillable = [
           'start_at',
           'ends_at',
           'day',
           'status',
           'group_id',
           'group_type'
       ];

       public function group(){
           return $this->morphTo();
       }

       function getDayAttribute($numericDay){
         $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
         return $days[$numericDay - 1];
     }



}
