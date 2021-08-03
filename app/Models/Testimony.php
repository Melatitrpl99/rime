<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Testimony
 * @package App\Models
 * @version August 2, 2021, 2:39 am UTC
 *
 * @property \App\Models\Product $product
 * @property \App\Models\User $user
 * @property foreignId $product_id
 * @property foreignId $user_id
 * @property string $judul
 * @property string $isi
 * @property integer $review
 */
class Testimony extends Model
{
    use SoftDeletes;


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
        'user_id' => 'required|integer',
        'judul' => 'nullable',
        'isi' => 'nullable|required_unless:judul,null',
        'review' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
