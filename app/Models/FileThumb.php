<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class FileThumb
 * @package App\Models
 * @version July 8, 2021, 12:04 am UTC
 *
 * @property mt1:File
 * @property string $path
 * @property string $dimensions
 * @property string $size
 */
class FileThumb extends Model
{
    use SoftDeletes;

    public $table = 'file_thumbs';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'file_id';

    public $fillable = [
        'path',
        'dimensions',
        'size'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'path' => 'string',
        'dimensions' => 'string',
        'size' => 'string'
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
