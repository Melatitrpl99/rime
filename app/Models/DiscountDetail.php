<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DiscountDetail
 * @package App\Models
 * @version May 18, 2021, 2:14 am UTC
 *
 * @property \App\Models\Discount $discount
 * @property \App\Models\Product $product
 * @property integer $diskon_harga
 * @property integer $minimal_produk
 * @property integer $maksimal_produk
 */
class DiscountDetail extends Model
{
    use SoftDeletes;


    public $table = 'discount_details';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'product_id';

    public $fillable = [
        'diskon_harga',
        'minimal_produk',
        'maksimal_produk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'diskon_harga' => 'integer',
        'minimal_produk' => 'integer',
        'maksimal_produk' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'discount_id' => 'required',
        'product_id' => 'required',
        'diskon_harga' => 'required|integer',
        'minimal_produk' => 'nullable|numeric',
        'maksimal_produk' => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function discount()
    {
        return $this->belongsTo(\App\Models\Discount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
