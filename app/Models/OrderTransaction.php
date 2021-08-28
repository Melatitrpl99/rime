<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\OrderTransaction.
 *
 * @property int $id
 * @property string $nomor
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $tanggal_masuk
 * @property int $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Order $order
 * @method static \Database\Factories\OrderTransactionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrderTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|OrderTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrderTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class OrderTransaction extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'nomor',
        'total',
        'order_id',
        'tanggal_masuk',
    ];

    protected $casts = [
        'tanggal_masuk' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
