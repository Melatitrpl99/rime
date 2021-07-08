<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class File
 * @package App\Models
 * @version July 8, 2021, 12:04 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $fileThumbs
 * @property string $name
 * @property morphs $fileable
 * @property string $mime_type
 * @property string $format
 * @property string $size
 * @property string $path
 * @property string $url
 */
class File extends Model
{
    use SoftDeletes;


    public $table = 'files';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'fileable',
        'mime_type',
        'format',
        'size',
        'path',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'mime_type' => 'string',
        'format' => 'string',
        'size' => 'string',
        'path' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'path' => 'nullable',
        'url' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fileThumbs()
    {
        return $this->hasMany(\App\Models\FileThumb::class);
    }
}
