<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version March 14, 2021, 12:10 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $shipments
 * @property \Illuminate\Database\Eloquent\Collection $transactionDetails
 * @property string $nomor_order
 * @property integer $status_order
 * @property string $pesan
 * @property string $kode_diskon
 * @property string $slug
 * @property unsignedBigInteger $user_id
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor_order',
        'status_order',
        'pesan',
        'kode_diskon',
        'slug',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor_order' => 'string',
        'status_order' => 'integer',
        'pesan' => 'string',
        'kode_diskon' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_order' => 'required',
        'status_order' => 'required',
        'pesan' => 'nullable',
        'kode_diskon' => 'nullable',
        'slug' => 'nullable',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transactionDetails()
    {
        return $this->hasMany(\App\Models\TransactionDetail::class);
    }
}
