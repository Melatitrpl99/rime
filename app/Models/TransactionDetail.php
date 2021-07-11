<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class TransactionDetail
 * @package App\Models
 * @version July 11, 2021, 1:49 am UTC
 *
 * @property \App\Models\Transaction $transaction
 * @property \App\Models\Order $order
 * @property integer $subtotal
 */
class TransactionDetail extends Model
{
    use SoftDeletes;


    public $table = 'transaction_details';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'order_id';

    public $fillable = [
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
        'subtotal' => 'required|numeric'
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
