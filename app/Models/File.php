<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 * @package App\Models
 * @version July 8, 2021, 12:04 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $fileThumbs
 * @property morphs $fileable
 * @property string $name
 * @property string $mime_type
 * @property string $format
 * @property string $size
 * @property string $path
 * @property string $url
 */
class File extends Model
{
    use SoftDeletes, HasFactory;

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

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string',
        'fileable' => 'nullable',
        'mime_type' => 'nullable|string',
        'format' => 'string',
        'size' => 'string',
        'path' => 'string',
        'url' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     **/
    public function fileable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fileThumbs()
    {
        return $this->hasMany(FileThumb::class);
    }
}
