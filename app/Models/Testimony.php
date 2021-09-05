<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'judul',
        'isi',
        'rating',
        'product_id',
        'user_id',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
