<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\OrderDetail.
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $color_id
 * @property int $size_id
 * @property int $jumlah
 * @property int $sub_total
 * @property int|null $diskon
 * @property-read \App\Models\Color $color
 * @property-read \App\Models\Size $size
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

    public $timestamps = false;

    public $incrementing = true;

    public $fillable = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
        'diskon',
    ];

    public static $pivotColumns = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
        'diskon',
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
