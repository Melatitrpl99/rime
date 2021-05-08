<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdditionalCost
 * @package App\Models
 * @version April 30, 2021, 6:09 am UTC
 *
 * @property string $tanggal
 * @property integer $nomor
 * @property string $nama
 * @property string $deskripsi
 * @property integer $total
 */
class AdditionalCost extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'additional_costs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'nomor',
        'nama',
        'deskripsi',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'integer',
        'nama' => 'string',
        'deskripsi' => 'string',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
