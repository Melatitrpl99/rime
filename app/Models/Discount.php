<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Discount
 * @package App\Models
 * @version May 18, 2021, 2:14 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $judul
 * @property string $deskripsi
 * @property string $kode
 * @property integer $batas_pemakaian
 * @property string $diskon_kategori
 * @property string $slug
 */
class Discount extends Model
{
    use SoftDeletes;


    public $table = 'discounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'kode',
        'batas_pemakaian',
        'diskon_kategori',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'deskripsi' => 'string',
        'kode' => 'string',
        'batas_pemakaian' => 'integer',
        'diskon_kategori' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'deskripsi' => 'nullable',
        'kode' => 'required|unique',
        'batas_pemakaian' => 'nullable|numeric',
        'diskon_kategori' => 'required',
        'slug' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'discount_details');
    }
}
