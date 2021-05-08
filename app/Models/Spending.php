<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Spending
 * @package App\Models
 * @version April 28, 2021, 3:49 am UTC
 *
 * @property string $tanggal
 * @property integer $nomor
 * @property string $kategori
 * @property string $deskripsi
 * @property integer $jumlah_barang
 * @property integer $total
 * @property integer $biaya_tambahan
 * @property integer $sub_total
 */
class Spending extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'spendings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'nomor',
        'kategori',
        'deskripsi',
        'jumlah_barang',
        'total',
        'biaya_tambahan',
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'integer',
        'kategori' => 'string',
        'deskripsi' => 'string',
        'jumlah_barang' => 'integer',
        'total' => 'integer',
        'biaya_tambahan' => 'integer',
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
