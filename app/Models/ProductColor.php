<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductColor
 * @package App\Models
 * @version July 8, 2021, 12:26 am UTC
 *
 * @property id $id
 * @property string $name
 * @property string $rgba_color
 */
class ProductColor extends Model
{
    use SoftDeletes;


    public $table = 'product_colors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'rgba_color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'rgba_color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|numeric',
        'name' => 'required',
        'rgba_color' => 'nullable'
    ];

    
}
