<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version February 27, 2021, 6:04 am UTC
 *
 * @property string $nomor_order
 * @property integer $status_order
 * @property string $pesan
 * @property string $kode_diskon
 * @property string $slug
 * @property integer $user_id
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor_order',
        'status_order',
        'pesan',
        'kode_diskon',
        'slug',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor_order' => 'string',
        'status_order' => 'integer',
        'kode_diskon' => 'string',
        'slug' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_order' => 'required',
        'status_order' => 'required',
        'pesan' => 'required',
        'kode_diskon' => 'required',
        'slug' => 'nullable',
        'user_id' => 'required'
    ];

    
}
