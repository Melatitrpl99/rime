<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeliveryCost
 * @package App\Models
 * @version August 30, 2021, 7:01 am UTC
 *
 * @property string $name
 * @property integer $harga
 * @property integer $jarak
 */
class DeliveryCost extends Model
{
    public $fillable = [
        'harga',
        'regency_id'
    ];
}
