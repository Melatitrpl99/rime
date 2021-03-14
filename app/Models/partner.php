<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Partner
 * @package App\Models
 * @version March 14, 2021, 12:08 am UTC
 *
 * @property string $nama
 * @property string $deskripsi
 * @property string $alamat
 * @property string $lokasi
 * @property string $email
 * @property string $no_hp
 * @property string $slug
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
        'no_hp',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'deskripsi' => 'string',
        'alamat' => 'string',
        'lokasi' => 'string',
        'email' => 'string',
        'no_hp' => 'string',
        'slug' => 'string'
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
        'email' => 'required|email',
        'no_hp' => 'required|numeric',
        'slug' => 'nullable'
    ];

    
}
