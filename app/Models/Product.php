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
        'deleted_at',
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

    public function image(): MorphOneOrMany
    {
        return $this->morphOne(File::class, 'fileable')->oldestOfMany();
    }
}
