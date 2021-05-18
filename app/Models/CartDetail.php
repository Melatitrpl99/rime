<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CartDetail
 * @package App\Models
 * @version May 18, 2021, 2:10 am UTC
 *
 * @property \App\Models\Cart $cart
 * @property \App\Models\Product $product
 * @property integer $jumlah
 * @property integer $subtotal
 */
class CartDetail extends Model
{
    use SoftDeletes;


    public $table = 'cart_details';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'product_id';

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
        'cart_id' => 'required',
        'product_id' => 'required',
        'jumlah' => 'required|numeric',
        'subtotal' => 'required|integer'
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
