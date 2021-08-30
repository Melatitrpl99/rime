<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpendingUnit extends Model
{
    use SoftDeletes;

    public $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
