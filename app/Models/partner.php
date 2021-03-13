<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class partner
 * @package App\Models
 * @version March 2, 2021, 5:27 am UTC
 *
 * @property string $nama
 * @property string $deskripsi
 * @property string $alamat
 * @property string $lokasi
 * @property string $email
 * @property string $no_hp
 */
class Partner extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partners';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'lokasi',
        'email',
        'no_hp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'lokasi' => 'string',
        'email' => 'string',
        'no_hp' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'deskripsi' => 'required',
        'alamat' => 'required',
        'lokasi' => 'required',
        'email' => 'required'
    ];

    
}
