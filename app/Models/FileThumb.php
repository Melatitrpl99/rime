<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class FileThumb
 * @package App\Models
 * @version May 18, 2021, 2:15 am UTC
 *
 * @property mt1:File
 * @property string $path
 */
class FileThumb extends Model
{
    use SoftDeletes;


    public $table = 'file_thumbs';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'file_id';

    public $fillable = [
        'path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'path' => 'nullable'
    ];

    
}
