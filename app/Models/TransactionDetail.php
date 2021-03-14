<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TransactionDetail
 * @package App\Models
 * @version March 14, 2021, 12:21 am UTC
 *
 * @property \App\Models\Transaction $transaction
 * @property \App\Models\Order $order
 * @property unsignedBigInteger $transaction_id
 * @property unsignedBigInteger $order_id
 * @property integer $subtotal
 */
class TransactionDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transaction_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'transaction_id',
        'order_id',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subtotal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transaction_id' => 'required',
        'order_id' => 'required',
        'subtotal' => 'required|number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaction()
    {
        return $this->belongsTo(\App\Models\Transaction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}
