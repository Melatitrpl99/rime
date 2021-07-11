<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activity
 * @package App\Models
 * @version July 8, 2021, 12:01 am UTC
 *
 * @property morphs $loggable
 * @property string $user_agent
 * @property string $ip_address
 */
class Activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';

    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public $incrementing = false;

    public $fillable = [
        'loggable_type',
        'loggable_id',
        'user_agent',
        'ip_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_agent' => 'string',
        'ip_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
