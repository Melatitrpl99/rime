<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 *
 * @package App\Models
 * @version July 11, 2021, 8:14 pm UTC
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $judul
 * @property string $deskripsi
 * @property string $kode
 * @property integer $batas_pemakaian
 * @property string $waktu_mulai
 * @property string $waktu_berakhir
 * @property string $slug
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read int|null $products_count
 * @method static \Database\Factories\DiscountFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newQuery()
 * @method static \Illuminate\Database\Query\Builder|Discount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereBatasPemakaian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereWaktuBerakhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereWaktuMulai($value)
 * @method static \Illuminate\Database\Query\Builder|Discount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Discount withoutTrashed()
 * @mixin \Eloquent
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
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'discount_details')
            ->withPivot(DiscountDetail::$pivotColumns)
            ->using(DiscountDetail::class);
    }
}
