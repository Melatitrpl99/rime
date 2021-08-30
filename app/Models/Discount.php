<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
