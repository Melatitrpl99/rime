<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Activity
 * @package App\Models
 * @version July 11, 2021, 8:23 pm UTC
 *
 * @property morphs $loggable
 * @property string $user_agent
 * @property string $ip_address
 * @property string $log
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
        'log' => 'string'
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
