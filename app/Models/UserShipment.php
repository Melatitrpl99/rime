<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserShipment extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'alamat',
        'kode_pos',
        'catatan',
        'is_default',
        'village_id',
        'user_id',
    ];

    protected $casts = [
        'kode_pos'   => 'string',
        'is_default' => 'boolean',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function scopeIsDefault(Builder $query): Builder
    {
        return $query->where('is_default', true);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
