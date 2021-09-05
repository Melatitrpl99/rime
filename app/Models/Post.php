<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
     * Filter posts displayed on front page.
     */
    public function scopeDisplayedOnFrontPage(Builder $query): Builder
    {
        return $query->where('front_page', true);
    }

    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function image(): MorphOneOrMany
    {
        return $this->morphOne(File::class, 'fileable')->latestOfMany();
    }
}
