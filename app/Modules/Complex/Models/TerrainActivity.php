<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 4/12/19
 * Time: 8:01 AM
 */

namespace App\Modules\Complex\Models;


use Illuminate\Database\Eloquent\Model;

class TerrainActivity extends Model
{

     protected $table="terrain_activities";

     protected $fillable=[
         'sport_category_id',
         'terrain_id',
         'prix',
         'sport_id',
         'duree_m',
         'duree_h'
     ];

    public function terrains()
    {

        return $this->hasMany('App\Modules\Complex\Models\Terrain', 'terrain_id');

    }
}