<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Shipment
 * @package App\Models
 * @version March 2, 2021, 5:53 am UTC
 *
 * @property integer $order_id
 * @property string $nama_lengkap
 * @property string $alamat
 * @property string $alamat_manual
 * @property string $kode_pos
 * @property string $rt
 * @property string $rw
 */
class Shipment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shipments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'order_id',
        'nama_lengkap',
        'alamat',
        'alamat_manual',
        'kode_pos',
        'rt',
        'rw'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'nama_lengkap' => 'string',
        'alamat' => 'string',
        'kode_pos' => 'string',
        'rt' => 'string',
        'rw' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'alamat_manual' => 'nullable',
        'kode_pos' => 'required',
        'rt' => 'required',
        'rw' => 'required'
    ];

    
}
