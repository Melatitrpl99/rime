<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductStock
 * @package App\Models
 * @version July 8, 2021, 12:39 am UTC
 *
 * @property \App\Models\Product $product
 * @property \App\Models\Colour $colour
 * @property \App\Models\Size $size
 * @property \App\Models\Dimensions $dimensions
 * @property foreignId $product_id
 * @property foreignId $colour_id
 * @property foreignId $size_id
 * @property foreignId $dimension_id
 * @property integer $stok_ready
 */
class ProductStock extends Model
{
    use SoftDeletes;


    public $table = 'product_stocks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_id',
        'product_color_id',
        'product_size_id',
        'product_dimension_id',
        'stok_ready'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stok_ready' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'product_color_id' => 'required',
        'product_size_id' => 'required',
        'product_dimension_id' => 'required',
        'stok_ready' => 'required'
    ];

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
    public function productColor()
    {
        return $this->belongsTo(\App\Models\ProductColour::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productSize()
    {
        return $this->belongsTo(\App\Models\ProductSize::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productDimension()
    {
        return $this->belongsTo(\App\Models\ProductDimension::class);
    }
}
