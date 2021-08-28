<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SpendingUnit
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit newQuery()
 * @method static \Illuminate\Database\Query\Builder|SpendingUnit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingUnit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SpendingUnit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SpendingUnit withoutTrashed()
 * @mixin \Eloquent
 */
class SpendingUnit extends Model
{
    use SoftDeletes;

    public $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
