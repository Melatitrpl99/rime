<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes, HasFactory;

    public $keyType = 'string';

    public $incrementing = 'false';

    protected $primaryKey = 'id';

    public $fillable = [
        'user_agent',
        'ip_address',
        'log',
    ];

    protected $casts = [
        'user_agent' => 'string',
        'ip_address' => 'string',
        'log'        => 'string',
    ];

    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }
}
