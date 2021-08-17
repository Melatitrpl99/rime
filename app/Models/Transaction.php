<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Transaction
 *
 * @package App\Models
 * @version August 7, 2021, 7:05 am UTC
 * @property \App\Models\Order $order
 * @property string $nomor
 * @property integer $total
 * @property foreignId $order_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\TransactionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaction withoutTrashed()
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'transactions';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
        'total',
        'order_id',
        'tanggal_masuk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'total' => 'integer',
        'tanggal_masuk' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required|string|max:16',
        'total' => 'required|integer',
        'order_id' => 'required',
        'tanggal_masuk' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
