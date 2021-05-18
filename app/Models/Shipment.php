<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Shipment
 * @package App\Models
 * @version May 18, 2021, 2:18 am UTC
 *
 * @property \App\Models\Order $order
 * @property string $nama_lengkap
 * @property string $alamat
 * @property string $no
 * @property string $rt
 * @property string $rw
 * @property string $desa_kelurahan
 * @property string $kecamatan
 * @property string $kabupaten_kota
 * @property string $provinsi
 * @property string $catatan
 * @property string $kode_pos
 * @property foreignId $order_id
 */
class Shipment extends Model
{
    use SoftDeletes;


    public $table = 'shipments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_lengkap',
        'alamat',
        'no',
        'rt',
        'rw',
        'desa_kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'catatan',
        'kode_pos',
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
        'desa_kelurahan' => 'string',
        'kecamatan' => 'string',
        'kabupaten_kota' => 'string',
        'provinsi' => 'string',
        'kode_pos' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'no' => 'nullable',
        'rt' => 'nullable',
        'rw' => 'nullable',
        'desa_kelurahan' => 'nullable',
        'kecamatan' => 'nullable',
        'kabupaten_kota' => 'nullable',
        'provinsi' => 'nullable',
        'catatan' => 'nullable',
        'kode_pos' => 'required',
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
