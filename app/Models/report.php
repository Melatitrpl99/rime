<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Report
 * @package App\Models
 * @version March 14, 2021, 12:20 am UTC
 *
 * @property \App\Models\User $user
 * @property string $judul
 * @property string $deskripsi
 * @property boolean $is_import
 * @property string $detail_laporan
 * @property string $slug
 * @property unsignedBigInteger $user_id
 */
class Report extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'is_import',
        'detail_laporan',
        'slug',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'is_import' => 'boolean',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'deskripsi' => 'nullable',
        'is_import' => 'nullable',
        'slug' => 'nullable',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
