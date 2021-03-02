<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class report
 * @package App\Models
 * @version March 2, 2021, 5:37 am UTC
 *
 * @property string $judul
 * @property string $deskripsi
 * @property integer $is_import
 * @property string $slug
 * @property string $detail_laporan
 * @property integer $user_id
 */
class report extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'is_import',
        'slug',
        'detail_laporan',
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
        'is_import' => 'integer',
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
        'is_import' => 'required',
        'slug' => 'nullable',
        'detail_laporan' => 'required'
    ];

    
}
