<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class News
 * @package App\Models
 * @version February 24, 2021, 7:58 am UTC
 *
 * @property string $judul
 * @property string $konten
 * @property string $slug
 * @property integer $user_id
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
        'id' => 'integer',
        'judul' => 'string',
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
        'konten' => 'required',
        'slug' => 'nullable',
        'user_id' => 'required'
    ];

    
}
