<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Size
 *
 * @package App\Models
 * @version July 8, 2021, 12:39 am UTC
 * @property id $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Query\Builder|Size onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Size withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Size withoutTrashed()
 * @mixin \Eloquent
 */
class Size extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'sizes';

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
        'name' => 'required'
    ];
}
