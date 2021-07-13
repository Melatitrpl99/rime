<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Shipment
 * @package App\Models
 * @version July 12, 2021, 8:47 pm UTC
 *
 * @property \App\Models\Village $village
 * @property \App\Models\Order $order
 * @property string $nama_lengkap
 * @property string $alamat
 * @property string $no
 * @property string $rt
 * @property string $rw
 * @property foreignId $village_id
 * @property string $kode_pos
 * @property string $catatan
 * @property foreignId $order_id
 */
class Shipment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'shipments';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama_lengkap',
        'alamat',
        'no',
        'rt',
        'rw',
        'village_id',
        'kode_pos',
        'catatan',
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
        'no' => 'string',
        'rt' => 'string',
        'rw' => 'string',
        'kode_pos' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_lengkap' => 'required|string',
        'alamat' => 'required|string',
        'no' => 'nullable|string',
        'rt' => 'nullable|string',
        'rw' => 'nullable|string',
        'village_id' => 'required|integer',
        'kode_pos' => 'required',
        'catatan' => 'nullable',
        'order_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function village()
    {
        return $this->belongsTo(\App\Models\Village::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}
