<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    use HasFactory;

    public $table = 'order_details';

    public $timestamps = false;

    public $incrementing = true;

    public $fillable = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
        'diskon',
    ];

    public static $pivotColumns = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
        'diskon',
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
