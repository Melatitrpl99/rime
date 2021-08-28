<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Testimony.
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string|null $judul
 * @property string|null $isi
 * @property int $review
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TestimonyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newQuery()
 * @method static \Illuminate\Database\Query\Builder|Testimony onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Testimony withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Testimony withoutTrashed()
 * @mixin \Eloquent
 */
class Testimony extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'judul',
        'isi',
        'review',
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
