<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class UserVerification
 *
 * @package App\Models
 * @version August 10, 2021, 6:25 am UTC
 * @property \App\Models\User $user
 * @property foreignId $user_id
 * @property string $result_token
 * @property number $similarity
 * @property number $accuracy
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
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


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'result_token',
        'similarity',
        'accuracy'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'result_token' => 'string',
        'similarity' => 'double',
        'accuracy' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'result_token' => 'nullable|string',
        'similarity' => 'nullable',
        'accuracy' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
