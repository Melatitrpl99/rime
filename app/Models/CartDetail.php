<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CartDetail
 * @package App\Models
 * @version July 8, 2021, 12:03 am UTC
 *
 * @property \App\Models\Cart $cart
 * @property \App\Models\Product $product
 * @property \App\Models\Colour $colour
 * @property \App\Models\Size $size
 * @property \App\Models\Dimensions $dimensions
 * @property foreignId $colour_id
 * @property foreignId $size_id
 * @property foreignId $dimension_id
 * @property integer $jumlah
 * @property integer $subtotal
 */
class CartDetail extends Pivot
{
    use SoftDeletes, HasFactory;

    public $table = 'cart_details';

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'color_id',
        'size_id',
        'dimension_id',
        'jumlah',
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jumlah' => 'integer',
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cart_id' => 'nullable',
        'product_id' => 'nullable',
        'color_id' => 'required',
        'size_id' => 'required',
        'dimension_id' => 'required',
        'jumlah' => 'nullable|numeric',
        'sub_total' => 'nullable|integer'
    ];

    public static $pivotColumns = [
        'color_id',
        'size_id',
        'dimension_id',
        'jumlah',
        'sub_total'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
