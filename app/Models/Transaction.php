<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Transaction
 * @package App\Models
 * @version March 14, 2021, 12:21 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $transactionDetails
 * @property string $nomor_transaksi
 * @property integer $total
 * @property unsignedBigInteger $user_id
 * @property string $slug
 */
class Transaction extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transactions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor_transaksi',
        'total',
        'user_id',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor_transaksi' => 'string',
        'total' => 'integer',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_transaksi' => 'required',
        'total' => 'required|integer',
        'user_id' => 'required',
        'slug' => 'nullable'
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
    public function transactionDetails()
    {
        return $this->hasMany(\App\Models\TransactionDetail::class);
    }
}
