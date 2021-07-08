<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetail
 * @package App\Models
 * @version July 8, 2021, 12:10 am UTC
 *
 * @property \App\Models\Order $order
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
class OrderDetail extends Pivot
{
    use SoftDeletes;

    public $table = 'order_details';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'product_color_id',
        'product_size_id',
        'product_dimension_id',
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
        'product_id' => 'required',
        'product_color_id' => 'required',
        'product_size_id' => 'required',
        'product_dimension_id' => 'required',
        'jumlah' => 'required|numeric',
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
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function colour()
    {
        return $this->belongsTo(\App\Models\Colour::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function size()
    {
        return $this->belongsTo(\App\Models\Size::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dimensions()
    {
        return $this->belongsTo(\App\Models\Dimensions::class);
    }
}
