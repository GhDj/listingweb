<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 4/15/19
 * Time: 4:35 PM
 */

namespace App\Modules\Complex\Models;


use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{

    protected $table = "sport_categories";
    protected $fillable = [
        'title',
        'sport_id',
    ];

    public function sport()
    {
        return $this->hasOne(Sport::class, 'id', 'sport_id');
    }
}