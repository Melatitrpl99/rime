<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderDetail
 * @package App\Models
 * @version March 14, 2021, 12:10 am UTC
 *
 * @property \App\Models\Order $order
 * @property \App\Models\Cart $cart
 * @property unsignedBigInteger $order_id
 * @property unsignedBigInteger $cart_id
 * @property integer $subtotal
 */
class OrderDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'order_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'order_id',
        'cart_id',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subtotal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'cart_id' => 'required',
        'subtotal' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cart()
    {
        return $this->belongsTo(\App\Models\Cart::class);
    }
}
