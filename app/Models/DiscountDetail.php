<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\DiscountDetail.
 *
 * @property int $discount_id
 * @property int $product_id
 * @property int $diskon_harga
 * @property int|null $minimal_produk
 * @property int|null $maksimal_produk
 * @method static \Database\Factories\DiscountDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail whereDiskonHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail whereMaksimalProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail whereMinimalProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscountDetail whereProductId($value)
 * @mixin \Eloquent
 */
class DiscountDetail extends Pivot
{
    use HasFactory;

    public $table = 'discount_details';

    public $timestamps = false;

    public $fillable = [
        'diskon_harga',
        'minimal_produk',
        'maksimal_produk',
    ];

    public static $pivotColumns = [
        'diskon_harga',
        'minimal_produk',
        'maksimal_produk',
    ];
}
