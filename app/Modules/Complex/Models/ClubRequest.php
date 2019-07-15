<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 7/13/2019
 * Time: 1:43 PM
 */

namespace App\Modules\Complex\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class ClubRequest extends Model
{
    protected $table = "club_request";
    protected $fillable = [
        'status',
        'user_id',
        'club_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function club()
    {
        return $this->hasOne(Club::class,'id','club_id');
    }

}