<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\SpendingDetail.
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $ket
 * @property int|null $harga_satuan
 * @property int|null $jumlah
 * @property int|null $sub_total
 * @property int $spending_id
 * @property int|null $spending_unit_id
 * @property-read \App\Models\Spending $spending
 * @property-read \App\Models\SpendingUnit|null $spendingUnit
 * @method static \Database\Factories\SpendingDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereHargaSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereSpendingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereSpendingUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereSubTotal($value)
 * @mixin \Eloquent
 */
class SpendingDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'nama',
        'ket',
        'harga_satuan',
        'jumlah',
        'sub_total',
        'spending_id',
        'spending_unit_id',
    ];

    public function spending(): BelongsTo
    {
        return $this->belongsTo(Spending::class);
    }

    public function spendingUnit(): BelongsTo
    {
        return $this->belongsTo(SpendingUnit::class);
    }
}
