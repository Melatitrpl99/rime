<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $judul
 * @property string $konten
 * @property int $front_page
 * @property string|null $slug
 * @property int $post_category_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\File|null $latestImage
 * @property-read \App\Models\User $user
 * @method static Builder|Post displayedOnFrontPage()
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static Builder|Post query()
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDeletedAt($value)
 * @method static Builder|Post whereFrontPage($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereJudul($value)
 * @method static Builder|Post whereKonten($value)
 * @method static Builder|Post wherePostCategoryId($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'judul',
        'konten',
        'front_page',
        'post_category_id',
        'user_id',
    ];

    protected $hidden = [
        'slug',
        'front_page',
        'deleted_at',
        'user_id',
    ];

    /**
     * Filter posts displayed on front page
     */
    public function scopeDisplayedOnFrontPage(Builder $query): Builder
    {
        return $query->where('front_page', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function latestImage(): MorphOneOrMany
    {
        return $this->morphOne(File::class, 'fileable')->latestOfMany();
    }
}
