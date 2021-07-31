<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 * @package App\Models
 * @version July 11, 2021, 8:14 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $judul
 * @property string $deskripsi
 * @property string $kode
 * @property integer $batas_pemakaian
 * @property string $waktu_mulai
 * @property string $waktu_berakhir
 * @property string $slug
 */
class Discount extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'discounts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'deskripsi',
        'kode',
        'batas_pemakaian',
        'waktu_mulai',
        'waktu_berakhir',
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
        'waktu_mulai' => 'datetime',
        'waktu_berakhir' => 'datetime',
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
        'kode' => 'required|unique:discounts',
        'batas_pemakaian' => 'nullable|numeric',
        'waktu_mulai' => 'nullable',
        'waktu_berakhir' => 'nullable',
        'slug' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(Product::class, 'discount_details')
            ->withPivot(DiscountDetail::$pivotColumns)
            ->using(DiscountDetail::class);
    }
}
