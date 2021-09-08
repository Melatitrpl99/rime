<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SpendingDetail extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    public $timestamps = false;

    public $fillable = [
        'nama',
        'ket',
        'harga_satuan',
        'jumlah_item',
        'jumlah_stok',
        'sub_total',
        'color_id',
        'size_id',
        'spending_unit_id',
    ];

    public static $pivotColumns = [
        'nama',
        'ket',
        'harga_satuan',
        'jumlah_item',
        'jumlah_stok',
        'sub_total',
        'color_id',
        'size_id',
        'spending_unit_id',
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function spendingUnit(): BelongsTo
    {
        return $this->belongsTo(SpendingUnit::class);
    }
}
