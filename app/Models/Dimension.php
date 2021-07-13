<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dimension
 * @package App\Models
 * @version July 8, 2021, 12:38 am UTC
 *
 * @property id $id
 * @property string $name
 */
class Dimension extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'dimensions';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:dimensions'
    ];
}
