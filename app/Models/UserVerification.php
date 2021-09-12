<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserVerification extends Model
{
    public $fillable = [
        'user_id',
        'face_path',
        'id_card_path',
        'result',
        'similarity',
        'status',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
