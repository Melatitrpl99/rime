<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Discount.
 *
 * @property int $id
 * @property string $judul
 * @property string|null $deskripsi
 * @property string $kode
 * @property int|null $batas_pemakaian
 * @property \Illuminate\Support\Carbon|null $waktu_mulai
 * @property \Illuminate\Support\Carbon|null $waktu_berakhir
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
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

    public $fillable = [
        'judul',
        'deskripsi',
        'kode',
        'batas_pemakaian',
        'waktu_mulai',
        'waktu_berakhir',
    ];

    protected $casts = [
        'waktu_mulai'     => 'datetime',
        'waktu_berakhir'  => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'discount_details')
            ->withPivot(DiscountDetail::$pivotColumns)
            ->using(DiscountDetail::class);
    }
}
