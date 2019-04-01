<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 3/31/19
 * Time: 5:28 PM
 */

namespace App\Modules\Complex\Models;


use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
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
    protected $table = 'clubs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reception',
        'catering_space',
        'handicap_access',
        'tribune_count','spectator_tribune_count',
        'cloakroom_player',
        'cloakroom_referee',
        'sports_sanitary',
         'parking_place',
        'handicap_parking_place',
        'complex_id',
        'cloakroom_referee',
        'sports_sanitary',

    ];

    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

}