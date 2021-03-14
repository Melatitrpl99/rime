<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Event
 * @package App\Models
 * @version March 14, 2021, 12:07 am UTC
 *
 * @property string $judul
 * @property string $deskripsi
 * @property string $waktu_mulai
 * @property string $waktu_berakhir
 * @property string $alamat
 * @property string $nomor_hp
 * @property string $email
 * @property string $slug
 */
class Event extends Model
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
        'email',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'deskripsi' => 'string',
        'alamat' => 'string',
        'nomor_hp' => 'string',
        'email' => 'string',
        'slug' => 'string'
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
        'waktu_berakhir' => 'nullable',
        'alamat' => 'required',
        'nomor_hp' => 'required|numeric',
        'email' => 'required|email',
        'slug' => 'nullable'
    ];

    
}
