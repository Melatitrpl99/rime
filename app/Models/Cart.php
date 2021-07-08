<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 * @package App\Models
 * @version July 8, 2021, 12:02 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $nomor
 * @property string $judul
 * @property string $deskripsi
 * @property foreignId $user_id
 */
class Cart extends Model
{
    use SoftDeletes;

    public $table = 'carts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
        'judul',
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
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required|max:16',
        'judul' => 'required',
        'deskripsi' => 'nullable',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'cart_details');
    }
}
