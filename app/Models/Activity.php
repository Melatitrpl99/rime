<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Activity
 *
 * @package App\Models
 * @version July 11, 2021, 8:23 pm UTC
 * @property morphs $loggable
 * @property string $user_agent
 * @property string $ip_address
 * @property string $log
 * @property string $id
 * @property string $loggable_type
 * @property int $loggable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\ActivityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Query\Builder|Activity onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereLoggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereLoggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserAgent($value)
 * @method static \Illuminate\Database\Query\Builder|Activity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Activity withoutTrashed()
 * @mixin \Eloquent
 */
class Activity extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'activities';

    public $keyType = 'string';

    public $incrementing = 'false';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'loggable',
        'user_agent',
        'ip_address',
        'log'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_agent' => 'string',
        'ip_address' => 'string',
        'log'        => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function loggable()
    {
        return $this->morphTo();
    }
}
