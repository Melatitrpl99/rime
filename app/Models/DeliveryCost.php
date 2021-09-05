<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeliveryCost
 * @package App\Models
 * @version August 30, 2021, 7:01 am UTC
 *
 * @property string $name
 * @property integer $harga
 * @property integer $jarak
 */
class DeliveryCost extends Model
{
    use SoftDeletes;


    public $table = 'delivery_costs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'harga',
        'jarak'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'harga' => 'integer',
        'jarak' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'harga' => 'required',
        'jarak' => 'required'
    ];

    
}
