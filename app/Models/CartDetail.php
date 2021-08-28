<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\CartDetail
 *
 * @property int $id
 * @property int $cart_id
 * @property int $product_id
 * @property int $color_id
 * @property int|null $size_id
 * @property int $jumlah
 * @property int $sub_total
 * @property-read \App\Models\Color $color
 * @property-read \App\Models\Size|null $size
 * @method static \Database\Factories\CartDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartDetail whereSubTotal($value)
 * @mixin \Eloquent
 */
class CartDetail extends Pivot
{
    use HasFactory;

    public $table = 'cart_details';

    public $timestamps = false;

    public $incrementing = true;

    public $fillable = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
    ];

    protected $casts = [
        'jumlah'    => 'integer',
        'sub_total' => 'integer'
    ];

    public static $pivotColumns = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total'
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
