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
        'color_id',
        'size_id',
        'dimension_id',
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
        'color_id' => 'required',
        'size_id' => 'required',
        'dimension_id' => 'required',
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
    public function color()
    {
        return $this->belongsTo(\App\Models\Color::class, 'color_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function size()
    {
        return $this->belongsTo(\App\Models\Size::class, 'size_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dimension()
    {
        return $this->belongsTo(\App\Models\Dimension::class, 'dimension_id');
    }
}
