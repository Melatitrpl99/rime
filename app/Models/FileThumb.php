<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FileThumb.
 *
 * @property int $id
 * @property int $file_id
 * @property string|null $path
 * @property string $dimensions
 * @property string $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\File $file
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb newQuery()
 * @method static \Illuminate\Database\Query\Builder|FileThumb onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereDimensions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileThumb whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FileThumb withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FileThumb withoutTrashed()
 * @mixin \Eloquent
 */
class FileThumb extends Model
{
    use SoftDeletes;

    public $fillable = [
        'path',
        'dimensions',
        'size',
        'file_id',
    ];

    protected $casts = [
        'size' => 'string',
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
