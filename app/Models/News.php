<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class News
 * @package App\Models
 * @version March 14, 2021, 12:07 am UTC
 *
 * @property \App\Models\User $user
 * @property string $judul
 * @property string $konten
 * @property string $slug
 * @property unsignedBigInteger $user_id
 */
class News extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'news';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'konten',
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
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'konten' => 'required',
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
