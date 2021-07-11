<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Status
 * @package App\Models
 * @version July 8, 2021, 12:39 am UTC
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 */
class Status extends Model
{
    use SoftDeletes;

    public $table = 'statuses';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'desc'
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
        'desc' => 'nullable'
    ];


}
