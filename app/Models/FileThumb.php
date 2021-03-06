<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FileThumb
 * @package App\Models
 * @version July 8, 2021, 12:04 am UTC
 *
 * @property \App\Models\File $file
 * @property integer $file_id
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

    public $incrementing = false;

    public $fillable = [
        'file_id',
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
        'file_id' => 'integer',
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
        'path' => 'nullable',
        'dimension' => 'nullable|string',
        'size' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
