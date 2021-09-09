<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spending extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'nomor',
        'judul',
        'deskripsi',
        'tanggal',
        'total',
        'spending_category_id',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'spending_details')
            ->withPivot(SpendingDetail::$pivotColumns)
            ->using(SpendingDetail::class);
    }

    public function spendingCategory(): BelongsTo
    {
        return $this->belongsTo(SpendingCategory::class);
    }
}
