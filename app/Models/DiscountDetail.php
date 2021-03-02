<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DiscountDetail
 * @package App\Models
 * @version March 2, 2021, 6:38 am UTC
 *
 * @property integer $discount_id
 * @property integer $id_produk
 * @property integer $minimal_produk
 * @property integer $maksimal_produk
 */
class DiscountDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'discount_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'discount_id',
        'id_produk',
        'minimal_produk',
        'maksimal_produk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discount_id' => 'integer',
        'id_produk' => 'integer',
        'minimal_produk' => 'integer',
        'maksimal_produk' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'discount_id' => 'required',
        'id_produk' => 'required',
        'minimal_produk' => 'required',
        'maksimal_produk' => 'required'
    ];

    
}
