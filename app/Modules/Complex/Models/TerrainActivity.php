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

     protected $table="";

     protected $fillable=[
         'sport_category_id',
         'terrain_id'
     ];
}