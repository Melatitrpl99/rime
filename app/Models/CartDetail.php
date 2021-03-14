<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CartDetail
 * @package App\Models
 * @version March 14, 2021, 12:10 am UTC
 *
 * @property \App\Models\Cart $cart
 * @property \App\Models\Product $product
 * @property unsignedBigInteger $cart_id
 * @property unsignedBigInteger $product_id
 * @property integer $subtotal
 */
class CartDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cart_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cart_id',
        'product_id',
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
        'cart_id' => 'required',
        'product_id' => 'required',
        'subtotal' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cart()
    {
        return $this->belongsTo(\App\Models\Cart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
