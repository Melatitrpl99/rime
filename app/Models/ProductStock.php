<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductStock
 * @package App\Models
 * @version May 18, 2021, 2:07 am UTC
 *
 * @property \App\Models\Product $product
 * @property foreignId $product_id
 * @property integer $stok
 * @property string $warna
 * @property string $size
 * @property string $dimensi
 */
class ProductStock extends Model
{
    use SoftDeletes;


    public $table = 'product_stocks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_id',
        'stok',
        'warna',
        'size',
        'dimensi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stok' => 'integer',
        'warna' => 'string',
        'size' => 'string',
        'dimensi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'stok' => 'required|numeric|default:0',
        'warna' => 'nullable',
        'size' => 'nullable',
        'dimensi' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
