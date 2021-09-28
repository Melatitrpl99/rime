<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVerification extends Model
{
    public $fillable = [
        'user_id',
        'uuid',
        'base_path',
        'face_path',
        'id_card_path',
        'result',
        'similarity',
        'verification_status_id',
    ];

    protected $casts = [
        'face_path'    => 'string',
        'id_card_path' => 'string',
        'result'       => 'string',
        'similarity'   => 'double',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function verificationStatus(): BelongsTo
    {
        return $this->belongsTo(VerificationStatus::class);
    }
}
