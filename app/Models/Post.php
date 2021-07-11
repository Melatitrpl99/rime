<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version May 18, 2021, 2:17 am UTC
 *
 * @property \App\Models\PostCategory $postCategory
 * @property \App\Models\User $user
 * @property string $judul
 * @property string $konten
 * @property foreignId $post_category_id
 * @property string $slug
 * @property foreignId $user_id
 */
class Post extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'posts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'konten',
        'post_category_id',
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
    public function postCategory()
    {
        return $this->belongsTo(\App\Models\PostCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
