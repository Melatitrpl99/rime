<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderDetail
 * @package App\Models
 * @version May 18, 2021, 2:11 am UTC
 *
 * @property \App\Models\Order $order
 * @property \App\Models\Cart $cart
 * @property integer $jumlah
 * @property integer $subtotal
 */
class OrderDetail extends Model
{
    use SoftDeletes;


    public $table = 'order_details';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'cart_id';

    public $fillable = [
        'jumlah',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jumlah' => 'integer',
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
        'jumlah' => 'required|numeric',
        'subtotal' => 'required|integer'
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
