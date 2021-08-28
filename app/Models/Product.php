<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property int $harga_customer
 * @property int $harga_reseller
 * @property int $reseller_minimum
 * @property string|null $slug
 * @property int $product_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discount[] $discounts
 * @property-read int|null $discounts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\File|null $latestImage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\ProductCategory $productCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductStock[] $productStocks
 * @property-read int|null $product_stocks_count
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product newModelQuery()
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product query()
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereCreatedAt($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereDeletedAt($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereDeskripsi($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereHargaCustomer($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereHargaReseller($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereId($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereNama($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereProductCategoryId($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereResellerMinimum($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereSlug($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use SoftDeletes, HasFactory, EagerLoadPivotTrait;

    public $fillable = [
        'nama',
        'deskripsi',
        'harga_customer',
        'harga_reseller',
        'reseller_minimum',
        'product_category_id',
    ];

    protected $hidden = [
        'slug',
        'updated_at',
        'deleted_at'
    ];

    public function productStocks(): HasMany
    {
        return $this->hasMany(ProductStock::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_details')
            ->withPivot(DiscountDetail::$pivotColumns)
            ->using(DiscountDetail::class);
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_details')
            ->withPivot(CartDetail::$pivotColumns)
            ->using(CartDetail::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_details')
            ->withPivot(OrderDetail::$pivotColumns)
            ->using(OrderDetail::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function latestImage(): MorphOneOrMany
    {
        return $this->morphOne(File::class, 'fileable')->latestOfMany();
    }
}
