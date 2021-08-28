<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Spending.
 *
 * @property int $id
 * @property string $nomor
 * @property string|null $judul
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon $tanggal
 * @property int|null $total
 * @property int $spending_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\SpendingCategory $spendingCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SpendingDetail[] $spendingDetails
 * @property-read int|null $spending_details_count
 * @method static \Database\Factories\SpendingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spending newQuery()
 * @method static \Illuminate\Database\Query\Builder|Spending onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Spending query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereSpendingCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Spending withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Spending withoutTrashed()
 * @mixin \Eloquent
 */
class Spending extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'total',
        'spending_category_id',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function spendingCategory(): BelongsTo
    {
        return $this->belongsTo(SpendingCategory::class);
    }

    public function spendingDetails(): HasMany
    {
        return $this->hasMany(SpendingDetail::class);
    }
}
