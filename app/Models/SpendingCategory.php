<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SpendingCategory
 *
 * @package App\Models
 * @version August 25, 2021, 3:09 pm UTC
 * @property string $name
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Spending[] $spendings
 * @property-read int|null $spendings_count
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|SpendingCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SpendingCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SpendingCategory withoutTrashed()
 * @mixin \Eloquent
 */
class SpendingCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function spendings(): HasMany
    {
        return $this->hasMany(Spending::class);
    }
}
