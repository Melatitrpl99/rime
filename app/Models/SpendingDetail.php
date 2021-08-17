<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SpendingDetail
 *
 * @package App\Models
 * @version May 18, 2021, 2:05 am UTC
 * @property \App\Models\Spending $spending
 * @property integer $subtotal
 * @property int $id
 * @property int $spending_id
 * @property string|null $nama
 * @property int|null $sub_total
 * @method static \Database\Factories\SpendingDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereSpendingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpendingDetail whereSubTotal($value)
 * @mixin \Eloquent
 */
class SpendingDetail extends Model
{
    use HasFactory;

    public $table = 'spending_details';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'spending_id';

    public $timestamps = false;

    public $fillable = [
        'nama',
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'spending_id' => 'required',
        'nama' => 'nullable|string',
        'sub_total' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spending()
    {
        return $this->belongsTo(\App\Models\Spending::class);
    }
}
