<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Order
 * @package App\Models
 * @version July 8, 2021, 12:05 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $shipments
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 * @property string $nomor
 * @property string $pesan
 * @property string $total
 * @property string $kode_diskon
 * @property string $biaya_pengiriman
 * @property foreignId $status_id
 * @property foreignId $user_id
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
        'status_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'pesan' => 'string',
        'total' => 'integer',
        'kode_diskon' => 'string',
        'biaya_pengiriman' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'nullable|max:16',
        'pesan' => 'nullable',
        'total' => 'nullable|numeric',
        'kode_diskon' => 'nullable|string',
        'biaya_pengiriman' => 'nullable|numeric',
        'status_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')
            ->withPivot(OrderDetail::$pivotColumns)
            ->using(OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_details')
            ->withPivot(['sub_total'])
            ->using(TransactionDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
