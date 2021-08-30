<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartDetail extends Pivot
{
    use HasFactory;

    public $table = 'cart_details';

    public $timestamps = false;

    public $incrementing = true;

    public $fillable = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
    ];

    protected $casts = [
        'jumlah'    => 'integer',
        'sub_total' => 'integer',
    ];

    public static $pivotColumns = [
        'color_id',
        'size_id',
        'jumlah',
        'sub_total',
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
