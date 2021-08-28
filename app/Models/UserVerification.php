<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserVerification
 *
 * @property int $id
 * @property int $user_id
 * @property string $result_token
 * @property float $similarity
 * @property float $accuracy
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserVerification onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereAccuracy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereResultToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereSimilarity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerification whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|UserVerification withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserVerification withoutTrashed()
 * @mixin \Eloquent
 */
class UserVerification extends Model
{
    use SoftDeletes;

    public $table = 'user_verifications';

    public $fillable = [
        'user_id',
        'result_token',
        'similarity',
        'accuracy',
        'status'
    ];

    protected $casts = [
        'result_token' => 'string',
        'similarity'   => 'double',
        'accuracy'     => 'double'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
