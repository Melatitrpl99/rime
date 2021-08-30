<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
