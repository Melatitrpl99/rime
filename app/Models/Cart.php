<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 * @package App\Models
 * @version July 8, 2021, 12:02 am UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Product $products
 * @property string $nomor
 * @property string $judul
 * @property string $deskripsi
 * @property string $total
 * @property foreignId $user_id
 */
class Cart extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'carts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
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
        'nomor' => 'string',
        'judul' => 'string',
        'total' => 'integer',
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
        'judul' => 'required',
        'total' => 'nullable|numeric',
        'deskripsi' => 'nullable',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_details')
            ->withPivot(CartDetail::$pivotColumns)
            ->using(CartDetail::class);
    }
}
