<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PostCategory
 * @package App\Models
 * @version May 18, 2021, 2:17 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $posts
 * @property string $name
 * @property string $desc
 */
class PostCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'post_categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'desc' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }
}
