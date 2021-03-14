<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * @package App\Models
 * @version March 14, 2021, 12:06 am UTC
 *
 * @property \App\Models\Category $category
 * @property \Illuminate\Database\Eloquent\Collection $cartDetails
 * @property \Illuminate\Database\Eloquent\Collection $discountDetails
 * @property string $nama
 * @property string $deskripsi
 * @property integer $stok
 * @property integer $harga_customer
 * @property integer $harga_reseller
 * @property integer $grosir_minimum
 * @property string $warna
 * @property string $ukuran
 * @property string $slug
 * @property unsignedBigInteger $category_id
 */
class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'deskripsi',
        'stok',
        'harga_customer',
        'harga_reseller',
        'grosir_minimum',
        'warna',
        'ukuran',
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
        'stok' => 'integer',
        'harga_customer' => 'integer',
        'harga_reseller' => 'integer',
        'grosir_minimum' => 'integer',
        'warna' => 'string',
        'ukuran' => 'string',
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
        'stok' => 'required|numeric',
        'harga_customer' => 'required|numeric',
        'harga_reseller' => 'required|numeric',
        'grosir_minimum' => 'required|numeric',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cartDetails()
    {
        return $this->hasMany(\App\Models\CartDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function discountDetails()
    {
        return $this->hasMany(\App\Models\DiscountDetail::class);
    }
}
