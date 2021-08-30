<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
