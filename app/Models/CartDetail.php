<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CartDetail
 * @package App\Models
 * @version February 24, 2021, 9:06 am UTC
 *
 * @property integer $cart_id
 * @property integer $product_id
 * @property integer $jumlah
 */
class CartDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cart_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cart_id',
        'product_id',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cart_id' => 'integer',
        'product_id' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cart_id' => 'required',
        'product_id' => 'required'
    ];

    
}
