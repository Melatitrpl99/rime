<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductDimension
 * @package App\Models
 * @version July 8, 2021, 12:38 am UTC
 *
 * @property id $id
 * @property string $name
 */
class ProductDimension extends Model
{
    use SoftDeletes;


    public $table = 'product_dimensions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|numeric',
        'name' => 'required'
    ];

    
}
