<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Status
 * @package App\Models
 * @version May 18, 2021, 2:03 am UTC
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

    public $timestamps = false;

    public $fillable = [
        'id',
        'name',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|numeric',
        'name' => 'required',
        'desc' => 'nullable'
    ];
}
