<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    public $fillable = [
        'judul',
        'deskripsi',
        'laporan_mulai',
        'laporan_selesai',
        'is_import',
        'slug',
        'user_id'
    ];

    protected $casts = [
        'is_import' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pdf(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
