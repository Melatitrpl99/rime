<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TransactionDetail
 * @package App\Models
 * @version March 2, 2021, 5:15 am UTC
 *
 * @property integer $order_id
 * @property integer $sub_total
 */
class TransactionDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transaction_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'order_id',
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'sub_total' => 'required'
    ];

    
}
