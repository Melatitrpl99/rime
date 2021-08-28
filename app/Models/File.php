<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string|null $fileable_type
 * @property int|null $fileable_id
 * @property string|null $mime_type
 * @property string|null $format
 * @property int|null $size
 * @property string|null $path
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileThumb[] $fileThumbs
 * @property-read int|null $file_thumbs_count
 * @property-read Model|\Eloquent $fileable
 * @method static \Database\Factories\FileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Query\Builder|File onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|File withTrashed()
 * @method static \Illuminate\Database\Query\Builder|File withoutTrashed()
 * @mixin \Eloquent
 */
class File extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'name',
        'mime_type',
        'format',
        'size',
        'path',
        'url'
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }

    public function fileThumbs(): HasMany
    {
        return $this->hasMany(FileThumb::class);
    }
}
