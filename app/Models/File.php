<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class File
 * @package App\Models
 * @version May 18, 2021, 2:15 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $fileThumbs
 * @property string $name
 * @property morphs $fileable
 * @property string $mime_type
 * @property string $format
 * @property string $path
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
        'path'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fileThumbs()
    {
        return $this->hasMany(\App\Models\FileThumb::class);
    }
}
