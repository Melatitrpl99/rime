<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Order
 *
 * @package App\Models
 * @version August 7, 2021, 9:51 am UTC
 * @property \App\Models\Status $status
 * @property \App\Models\Shipment $shipment
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $nomor
 * @property string $pesan
 * @property integer $total
 * @property string $kode_diskon
 * @property integer $biaya_pengiriman
 * @property integer $berat
 * @property foreignId $status_id
 * @property foreignId $shipment_id
 * @property foreignId $user_id
 * @property int $id
 * @property string|null $kode_resi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\File|null $invoice
 * @property-read int|null $products_count
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order isCancelled()
 * @method static \Illuminate\Database\Eloquent\Builder|Order isCompleted()
 * @method static \Illuminate\Database\Eloquent\Builder|Order isDelayed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order isNew()
 * @method static \Illuminate\Database\Eloquent\Builder|Order isProcessing()
 * @method static \Illuminate\Database\Eloquent\Builder|Order isShipping()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBerat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBiayaPengiriman($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereKodeDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereKodeResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 * @property-read \App\Models\Transaction|null $trasaction
 * @mixin \Eloquent
 */
class Order extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'orders';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor',
        'pesan',
        'total',
        'kode_diskon',
        'biaya_pengiriman',
        'berat',
        'kode_resi',
        'status_id',
        'shipment_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor'            => 'string',
        'pesan'            => 'string',
        'total'            => 'integer',
        'kode_diskon'      => 'string',
        'biaya_pengiriman' => 'integer',
        'berat'            => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pesan'            => 'nullable',
        'total'            => 'nullable|numeric',
        'kode_diskon'      => 'nullable|string',
        'biaya_pengiriman' => 'nullable|numeric',
        'berat'            => 'nullable|numeric',
        'kode_resi'        => 'nullable|string',
        'status_id'        => 'required',
        'shipment_id'      => 'required',
        'user_id'          => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNew($query)
    {
        return $query->where('status_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsProcessing($query)
    {
        return $query->whereIn('status_id', [2, 3]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsShipping($query)
    {
        return $query->where('status_id', 4);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsCompleted($query)
    {
        return $query->where('status_id', 5);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsDelayed($query)
    {
        return $query->where('status_id', 6);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsCancelled($query)
    {
        return $query->where('status_id', 7);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')
            ->withPivot(OrderDetail::$pivotColumns)
            ->using(OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function invoice()
    {
        return $this->morphOne(File::class, 'fileable')->latestOfMany();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function trasaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
