<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Events
 * @package App\Models
 * @version February 22, 2021, 7:18 am UTC
 *
 * @property string $judul
 * @property string $deskripsi
 * @property timestamps $waktu_mulai
 * @property timestamps $waktu_berakhir
 * @property string $alamat
 * @property string $nomor_hp
 * @property string $email
 */
class Events extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'events';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'waktu_mulai',
        'waktu_berakhir',
        'alamat',
        'nomor_hp',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'alamat' => 'string',
        'nomor_hp' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'deskripsi' => 'required',
        'waktu_mulai' => 'required',
        'waktu_berakhir' => 'required',
        'alamat' => 'required',
        'nomor_hp' => 'required',
        'email' => 'required'
    ];

    
}
