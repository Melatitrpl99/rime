<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Spending
 *
 * @package App\Models
 * @version May 18, 2021, 2:05 am UTC
 * @property \Illuminate\Database\Eloquent\Collection $spendingDetails
 * @property string $nomor
 * @property string $deskripsi
 * @property string $tanggal
 * @property string $kategori
 * @property integer $qty
 * @property integer $sub_total
 * @property int $id
 * @property int|null $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
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
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spending whereQty($value)
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

    public $table = 'spendings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
        'deskripsi',
        'tanggal',
        'kategori',
        'qty',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'deskripsi' => 'string',
        'kategori' => 'string',
        'tanggal' => 'datetime',
        'qty' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required|max:16'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spendingDetails()
    {
        return $this->hasMany(\App\Models\SpendingDetail::class);
    }
}
