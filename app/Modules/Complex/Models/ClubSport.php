<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 7/16/2019
 * Time: 4:50 AM
 */

namespace App\Modules\Complex\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Complex\Models\Sport;

class ClubSport extends Model
{
    protected $table = "club_sports";
    protected $fillable = [
        'sport_id',
        'club_id',
    ];


    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function club()
    {
        return $this->hasMany(Club::class,'id','club_id');
    }

}
