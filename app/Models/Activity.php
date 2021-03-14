<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Activity
 * @package App\Models
 * @version March 14, 2021, 12:05 am UTC
 *
 * @property \App\Models\User $user
 * @property string $name
 * @property string $desc
 * @property nullableMorphs $loggable
 * @property unsignedBigInteger $user_id
 */
class Activity extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'desc',
        'loggable',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'desc' => 'nullable',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
