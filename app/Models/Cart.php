<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cart
 * @package App\Models
 * @version March 14, 2021, 12:09 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $cartDetails
 * @property \Illuminate\Database\Eloquent\Collection $orderDetails
 * @property string $judul
 * @property string $deskripsi
 * @property string $slug
 * @property unsignedBigInteger $user_id
 */
class Cart extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'carts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'slug',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'deskripsi' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'deskripsi' => 'nullable',
        'slug' => 'nullable',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cartDetails()
    {
        return $this->hasMany(\App\Models\CartDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderDetails()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }
}
