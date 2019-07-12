<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 4/2/19
 * Time: 10:57 PM
 */

namespace App\Modules\Complex\Models;


use Illuminate\Database\Eloquent\Model;

class ComplexCategory extends Model
{
    protected $table="complex_categories";
    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'complex_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function complex()
    {
        return $this->hasMany(Complex::class,'id','complex_id');
    }


}