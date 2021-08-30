<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStock extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'stok_ready',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    /**
     * Find all products by stock is still available.
     */
    public function scopeIsReady(Builder $query): Builder
    {
        return $query->where('stok_ready', '>', 0);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
