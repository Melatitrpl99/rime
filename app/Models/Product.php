<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * Class Product
 *
 * @package App\Models
 * @version July 8, 2021, 8:41 am UTC
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
 * @property int $id
 * @property int|null $suka
 * @property int $product_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read int|null $carts_count
 * @property-read int|null $discounts_count
 * @property-read \App\Models\File $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read int|null $orders_count
 * @property-read \App\Models\ProductCategory $productCategory
 * @property-read int|null $product_stocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Testimony[] $testimonies
 * @property-read int|null $testimonies_count
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
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereSuka($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
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
        'product_category_id',
        'suka',
        'slug',
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
        'suka'             => 'integer',
        'slug'             => 'string'
    ];

    protected $hidden = [
        'slug',
        'created_at',
        'deleted_at'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama'                => 'required|string',
        'deskripsi'           => 'required|string',
        'harga_customer'      => 'required|numeric',
        'harga_reseller'      => 'required|numeric',
        'reseller_minimum'    => 'required|numeric',
        'suka'                => 'nullable|numeric',
        'slug'                => 'nullable',
        'product_category_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_details')
            ->withPivot(CartDetail::$pivotColumns)
            ->using(CartDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')
            ->withPivot(OrderDetail::$pivotColumns)
            ->using(OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_details')
            ->withPivot(DiscountDetail::$pivotColumns)
            ->using(DiscountDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image()
    {
        return $this->morphOne(File::class, 'fileable')->oldestOfMany();
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonies()
    {
        return $this->hasMany(Testimony::class);
    }
}
