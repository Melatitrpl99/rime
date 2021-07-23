<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version May 18, 2021, 2:11 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $nomor
 * @property integer $total
 * @property foreignId $user_id
 */
class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'transactions';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
        'total',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'nullable|max:16',
        'total' => 'required|integer',
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
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'transaction_details')
            ->withPivot(['sub_total'])
            ->using(TransactionDetail::class);
    }
}
