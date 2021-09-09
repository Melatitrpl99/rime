<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'lokasi',
        'email',
        'no_telp',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
