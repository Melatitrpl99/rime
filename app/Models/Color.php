<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Color
 *
 * @package App\Models
 * @version July 8, 2021, 12:26 am UTC
 * @property id $id
 * @property string $name
 * @property string $rgba_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\ColorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereRgbaColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Color withoutTrashed()
 * @mixin \Eloquent
 */
class Color extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'colors';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'rgba_color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'rgba_color' => 'string'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'rgba_color' => 'nullable'
    ];
}
