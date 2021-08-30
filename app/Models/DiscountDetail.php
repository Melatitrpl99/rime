<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DiscountDetail extends Pivot
{
    use HasFactory;

    public $table = 'discount_details';

    public $timestamps = false;

    public $fillable = [
        'diskon_harga',
        'minimal_produk',
        'maksimal_produk',
    ];

    public static $pivotColumns = [
        'diskon_harga',
        'minimal_produk',
        'maksimal_produk',
    ];
}
