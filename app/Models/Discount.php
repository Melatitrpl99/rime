<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Discount
 * @package App\Models
 * @version March 2, 2021, 6:34 am UTC
 *
 * @property string $judul
 * @property string $kode
 * @property integer $batas_pemakaian
 * @property string $diskon_kategori
 */
class Discount extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'discounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'kode',
        'batas_pemakaian',
        'diskon_kategori'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'kode' => 'string',
        'batas_pemakaian' => 'integer',
        'diskon_kategori' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'kode' => 'required',
        'batas_pemakaian' => 'required'
    ];

    
}
