<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductStock
 *
 * @package App\Models
 * @version July 8, 2021, 12:39 am UTC
 * @property \App\Models\Product $product
 * @property \App\Models\Colour $colour
 * @property \App\Models\Size $size
 * @property \App\Models\Dimensions $dimensions
 * @property foreignId $product_id
 * @property foreignId $colour_id
 * @property foreignId $size_id
 * @property foreignId $dimension_id
 * @property integer $stok_ready
 * @property int $id
 * @property int $color_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Color $color
 * @method static \Database\Factories\ProductStockFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductStock onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereStokReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductStock withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductStock withoutTrashed()
 * @mixin \Eloquent
 */
class ProductStock extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'product_stocks';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'dimension_id',
        'stok_ready'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stok_ready' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id'   => 'required',
        'color_id'     => 'required',
        'size_id'      => 'nullable',
        'dimension_id' => 'nullable',
        'stok_ready'   => 'nullable'
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
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
