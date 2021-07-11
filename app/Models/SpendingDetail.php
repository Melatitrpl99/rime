<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SpendingDetail
 * @package App\Models
 * @version May 18, 2021, 2:05 am UTC
 *
 * @property \App\Models\Spending $spending
 * @property integer $subtotal
 */
class SpendingDetail extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'spending_details';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'spending_id';

    public $fillable = [
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subtotal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'spending_id' => 'required',
        'subtotal' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function spending()
    {
        return $this->belongsTo(\App\Models\Spending::class);
    }
}
