<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Product
 * @package App\Models
 * @version February 20, 2021, 7:43 am UTC
 *
 * @property string $title
 * @property string $desc
 * @property integer $stock
 * @property integer $cust_price
 * @property integer $reseller_price
 * @property integer $reseller_factor
 * @property string $slug
 * @property string $colour
 * @property string $size
 * @property integer $category_id
 */
class Product extends Model
{


    public $table = 'products';
    



    public $fillable = [
        'title',
        'desc',
        'stock',
        'cust_price',
        'reseller_price',
        'reseller_factor',
        'slug',
        'colour',
        'size',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'stock' => 'integer',
        'cust_price' => 'integer',
        'reseller_price' => 'integer',
        'reseller_factor' => 'integer',
        'slug' => 'string',
        'colour' => 'string',
        'size' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
