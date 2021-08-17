<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 *
 * @package App\Models
 * @version July 8, 2021, 12:02 am UTC
 * @property \App\Models\User $user
 * @property \App\Models\Product $products
 * @property string $nomor
 * @property string $judul
 * @property string $deskripsi
 * @property string $total
 * @property foreignId $user_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read int|null $products_count
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

    public $table = 'carts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'total',
        'deskripsi',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul'     => 'string',
        'total'     => 'integer',
        'deskripsi' => 'string'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul'     => 'required',
        'total'     => 'nullable|numeric',
        'deskripsi' => 'nullable',
        'user_id'   => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_details')
            ->withPivot(CartDetail::$pivotColumns)
            ->using(CartDetail::class);
    }
}
