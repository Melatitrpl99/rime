<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpendingCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function spendings(): HasMany
    {
        return $this->hasMany(Spending::class);
    }
}
