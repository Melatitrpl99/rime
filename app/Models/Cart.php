<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'judul',
        'total',
        'deskripsi',
        'user_id',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart_details')
            ->withPivot(CartDetail::$pivotColumns)
            ->using(CartDetail::class);
    }
}
