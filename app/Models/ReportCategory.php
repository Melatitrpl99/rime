<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCategory extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'desc',
        'view',
    ];

    public static $rules = [
        'name' => ['required', 'string', 'max:255']
    ];
}
