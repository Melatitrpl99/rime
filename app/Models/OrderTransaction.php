<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
