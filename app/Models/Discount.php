<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Discount
 * @package App\Models
 * @version March 14, 2021, 12:09 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $discountDetails
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

    use HasFactory;

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
        'kode' => 'required',
        'batas_pemakaian' => 'nullable|numeric',
        'diskon_kategori' => 'required',
        'slug' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function discountDetails()
    {
        return $this->hasMany(\App\Models\DiscountDetail::class);
    }
}
