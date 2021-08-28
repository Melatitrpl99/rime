<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property string $judul
 * @property string|null $deskripsi
 * @property int|null $total
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CartFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Query\Builder|Cart onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Cart withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Cart withoutTrashed()
 * @mixin \Eloquent
 */
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
        'deleted_at'
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
