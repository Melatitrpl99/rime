<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'name',
        'mime_type',
        'format',
        'size',
        'path',
        'url',
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
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
