<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Shipment
 * @package App\Models
 * @version March 14, 2021, 12:21 am UTC
 *
 * @property \App\Models\Order $order
 * @property string $nama_lengkap
 * @property string $alamat
 * @property string $alamat_manual
 * @property string $kode_pos
 * @property string $slug
 * @property unsignedBigInteger $order_id
 */
class Shipment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shipments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_lengkap',
        'alamat',
        'alamat_manual',
        'kode_pos',
        'slug',
        'order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_lengkap' => 'string',
        'alamat' => 'string',
        'kode_pos' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'alamat_manual' => 'nullable',
        'kode_pos' => 'required',
        'slug' => 'nullable',
        'order_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}
