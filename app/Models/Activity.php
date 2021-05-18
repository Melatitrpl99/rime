<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Activity
 * @package App\Models
 * @version May 18, 2021, 2:02 am UTC
 *
 * @property morphs $loggable
 * @property string $log
 */
class Activity extends Model
{
    use SoftDeletes;


    public $table = 'activities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'loggable',
        'log'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
