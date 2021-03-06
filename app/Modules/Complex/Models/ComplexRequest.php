<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 4/12/19
 * Time: 8:36 AM
 */

namespace App\Modules\Complex\Models;


use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class ComplexRequest extends Model
{
    protected $table = "complex_request";
    protected $fillable = [
        'status',
        'user_id',
        'complex_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function complex()
    {
        return $this->hasOne(Complex::class,'id','complex_id');
    }

}