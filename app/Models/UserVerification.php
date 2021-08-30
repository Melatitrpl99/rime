<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVerification extends Model
{
    use SoftDeletes;

    public $table = 'user_verifications';

    public $fillable = [
        'user_id',
        'result_token',
        'similarity',
        'accuracy',
        'status',
    ];

    protected $casts = [
        'result_token' => 'string',
        'similarity'   => 'double',
        'accuracy'     => 'double',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
