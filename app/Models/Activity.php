<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Activity
 * @package App\Models
 * @version February 24, 2021, 7:45 am UTC
 *
 * @property string $nama
 * @property string $deskripsi
 * @property string $log
 * @property integer $user_id
 */
class Activity extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'deskripsi',
        'log',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'log' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'deskripsi' => 'required',
        'user_id' => 'required'
    ];

    
}
