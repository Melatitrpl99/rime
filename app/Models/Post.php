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
 * @property string $slug
 * @property foreignId $post_category_id
 * @property foreignId $user_id
 */
class Post extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'posts';

    public $fillable = [
        'judul',
        'konten',
        'slug',
        'post_category_id',
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
        'user_id' => 'required',
        'post_category_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
