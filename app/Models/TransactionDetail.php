<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class TransactionDetail
 * @package App\Models
 * @version July 11, 2021, 1:49 am UTC
 *
 * @property \App\Models\Transaction $transaction
 * @property \App\Models\Order $order
 * @property integer $sub_total
 */
class TransactionDetail extends Pivot
{
    use SoftDeletes, HasFactory;

    public $table = 'transaction_details';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transaction_id' => 'required',
        'order_id' => 'required',
        'sub_total' => 'required|numeric'
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
