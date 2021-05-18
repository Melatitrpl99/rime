<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Order
 * @package App\Models
 * @version May 18, 2021, 2:11 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $shipments
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 * @property string $nomor
 * @property string $pesan
 * @property string $kode_diskon
 * @property integer $status_id
 * @property foreignId $user_id
 */
class Order extends Model
{
    use SoftDeletes;


    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor',
        'pesan',
        'kode_diskon',
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
        'kode_diskon' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required|max:16',
        'pesan' => 'nullable',
        'kode_diskon' => 'nullable',
        'status_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function shipments()
    {
        return $this->hasMany(\App\Models\Shipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'order_details');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function transactions()
    {
        return $this->belongsToMany(\App\Models\Transaction::class, 'transaction_details');
    }
}
