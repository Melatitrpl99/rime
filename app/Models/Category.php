<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version May 18, 2021, 2:19 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $nama
 * @property string $slug
 */
class Category extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'slug' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
