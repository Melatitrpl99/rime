<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    public $fillable = [
        'judul',
        'deskripsi',
        'is_import',
        'slug',
        'user_id'
    ];

    protected $casts = [
        'is_import' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
