<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetail
 *
 * @package App\Models
 * @version July 8, 2021, 12:10 am UTC
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
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $color_id
 * @property int $sub_total
 * @property int|null $diskon
 * @property-read \App\Models\Color $color
 * @method static \Database\Factories\OrderDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereSubTotal($value)
 * @mixin \Eloquent
 */
class OrderDetail extends Pivot
{
    use HasFactory;

    public $table = 'order_details';

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public $incrementing = true;

    public $fillable = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
        'diskon'
    ];

    public static $pivotColumns = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
        'diskon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jumlah'    => 'integer',
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id'   => 'required|integer',
        'product_id' => 'required|integer',
        'color_id'   => 'nullable|integer',
        'size_id'    => 'nullable|integer',
        'jumlah'     => 'required|numeric',
        'diskon'     => 'nullable|numeric',
        'sub_total'  => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
