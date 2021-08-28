<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductStock.
 *
 * @property int $id
 * @property int $product_id
 * @property int $color_id
 * @property int|null $size_id
 * @property int $stok_ready
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Color $color
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Size|null $size
 * @method static \Database\Factories\ProductStockFactory factory(...$parameters)
 * @method static Builder|ProductStock isReady()
 * @method static Builder|ProductStock newModelQuery()
 * @method static Builder|ProductStock newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductStock onlyTrashed()
 * @method static Builder|ProductStock query()
 * @method static Builder|ProductStock whereColorId($value)
 * @method static Builder|ProductStock whereCreatedAt($value)
 * @method static Builder|ProductStock whereDeletedAt($value)
 * @method static Builder|ProductStock whereId($value)
 * @method static Builder|ProductStock whereProductId($value)
 * @method static Builder|ProductStock whereSizeId($value)
 * @method static Builder|ProductStock whereStokReady($value)
 * @method static Builder|ProductStock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductStock withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductStock withoutTrashed()
 * @mixin \Eloquent
 */
class ProductStock extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'stok_ready',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    /**
     * Find all products by stock is still available.
     */
    public function scopeIsReady(Builder $query): Builder
    {
        return $query->where('stok_ready', '>', 0);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
