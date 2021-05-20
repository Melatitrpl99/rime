<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Product
 * @package App\Models
 * @version May 18, 2021, 2:07 am UTC
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
 * @property integer $resellser_minimum
 * @property string $warna
 * @property string $size
 * @property string $dimensi
 * @property string $slug
 * @property foreignId $category_id
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'deskripsi',
        'harga_customer',
        'harga_reseller',
        'resellser_minimum',
        'warna',
        'size',
        'dimensi',
        'slug',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'harga_customer' => 'integer',
        'harga_reseller' => 'integer',
        'resellser_minimum' => 'integer',
        'warna' => 'string',
        'size' => 'string',
        'dimensi' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'deskripsi' => 'required',
        'harga_customer' => 'required|numeric',
        'harga_reseller' => 'required|numeric',
        'resellser_minimum' => 'required|numeric',
        'slug' => 'nullable',
        'category_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function carts()
    {
        return $this->belongsToMany(\App\Models\Cart::class, 'cart_details')
            ->withPivot(['jumlah', 'subtotal']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function orders()
    {
        return $this->belongsToMany(\App\Models\Order::class, 'order_details')
            ->withPivot(['jumlah', 'subtotal']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function discounts()
    {
        return $this->belongsToMany(\App\Models\Discount::class, 'discount_details')
            ->withPivot(['diskon_harga', 'minimal_produk', 'maksimal_produk']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productStocks()
    {
        return $this->hasMany(\App\Models\ProductStock::class);
    }
}
