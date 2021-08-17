<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PostCategory
 *
 * @package App\Models
 * @version May 18, 2021, 2:17 am UTC
 * @property \Illuminate\Database\Eloquent\Collection $posts
 * @property string $name
 * @property string $desc
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read int|null $posts_count
 * @method static \Database\Factories\PostCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|PostCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PostCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PostCategory withoutTrashed()
 * @mixin \Eloquent
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
     */
    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }
}
