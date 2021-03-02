<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Carts
 * @package App\Models
 * @version February 24, 2021, 8:55 am UTC
 *
 * @property string $judul
 * @property string $deskripsi
 * @property string $slug
 * @property integer $user_id
 */
class Carts extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'carts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'slug',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'deskripsi' => 'string',
        'slug' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'deskripsi' => 'required',
        'slug' => 'nullable',
        'user_id' => 'required'
    ];

    
}
