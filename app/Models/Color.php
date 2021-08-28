<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $name
 * @property string|null $rgba_color
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

    public $fillable = [
        'name',
        'rgba_color'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
