<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 * @package App\Models
 * @version May 18, 2021, 2:15 am UTC
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
    use SoftDeletes, HasFactory;

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
