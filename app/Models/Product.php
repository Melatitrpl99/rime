<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * Class Product
 * @package App\Models
 * @version July 8, 2021, 8:41 am UTC
 *
 * @property \App\Models\Category $category
 * @property \Illuminate\Database\Eloquent\Collection $carts
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property \Illuminate\Database\Eloquent\Collection $discounts
 * @property \Illuminate\Database\Eloquent\Collection $productStocks
 * @property string $nama
 * @property string $deskripsi
 * @property integer $harga_customer
 * @property integer $harga_reseller
 * @property integer $reseller_minimum
 * @property string $slug
 * @property foreignId $category_id
 */
class Product extends Model
{
    use SoftDeletes, HasFactory, EagerLoadPivotTrait;

    public $table = 'products';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'deskripsi',
        'harga_customer',
        'harga_reseller',
        'reseller_minimum',
        'slug',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama'             => 'string',
        'harga_customer'   => 'integer',
        'harga_reseller'   => 'integer',
        'reseller_minimum' => 'integer',
        'slug'             => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama'             => 'required|string',
        'deskripsi'        => 'required|string',
        'harga_customer'   => 'required|numeric',
        'harga_reseller'   => 'required|numeric',
        'reseller_minimum' => 'required|numeric',
        'suka'             => 'required|numeric',
        'slug'             => 'nullable',
        'category_id'      => 'required',
        'path'             => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_details')
            ->withPivot(CartDetail::$pivotColumns)
            ->using(CartDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')
            ->withPivot(OrderDetail::$pivotColumns)
            ->using(OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_details')
            ->withPivot(DiscountDetail::$pivotColumns)
            ->using(DiscountDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productStocks()
    {
        return $this->hasMany(ProductStock::class);
    }
}
