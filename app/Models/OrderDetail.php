<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderDetail
 * @package App\Models
 * @version February 27, 2021, 7:01 am UTC
 *
 * @property integer $cart_id
 * @property integer $total
 */
class OrderDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'order_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cart_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cart_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cart_id' => 'required',
        'total' => 'required'
    ];

    
}
