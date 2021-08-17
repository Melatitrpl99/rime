<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Testimony
 *
 * @package App\Models
 * @version August 2, 2021, 2:39 am UTC
 * @property \App\Models\Product $product
 * @property \App\Models\User $user
 * @property foreignId $product_id
 * @property foreignId $user_id
 * @property string $judul
 * @property string $isi
 * @property integer $review
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\TestimonyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newQuery()
 * @method static \Illuminate\Database\Query\Builder|Testimony onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Testimony withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Testimony withoutTrashed()
 * @mixin \Eloquent
 */
class Testimony extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'testimonies';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'product_id',
        'user_id',
        'judul',
        'isi',
        'review'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'review' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required|integer',
        'user_id'    => 'required|integer',
        'judul'      => 'nullable',
        'isi'        => 'nullable|required_unless:judul,null',
        'review'     => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
