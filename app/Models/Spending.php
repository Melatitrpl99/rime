<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Spending
 * @package App\Models
 * @version May 18, 2021, 2:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $spendingDetails
 * @property string $nomor
 * @property string $deskripsi
 * @property string $tanggal
 * @property string $kategori
 * @property integer $qty
 * @property integer $sub_total
 */
class Spending extends Model
{
    use SoftDeletes;


    public $table = 'spendings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor',
        'deskripsi',
        'tanggal',
        'kategori',
        'qty',
        'sub_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor' => 'string',
        'deskripsi' => 'string',
        'kategori' => 'string',
        'qty' => 'integer',
        'sub_total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required|max:16'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spendingDetails()
    {
        return $this->hasMany(\App\Models\SpendingDetail::class);
    }
}
