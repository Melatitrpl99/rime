<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Category
 * @package App\Models
 * @version February 20, 2021, 7:27 am UTC
 *
 * @property string $name
 * @property string $slug
 */
class Category extends Model
{


    public $table = 'categories';
    



    public $fillable = [
        'name',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'nullable'
    ];

    
}
