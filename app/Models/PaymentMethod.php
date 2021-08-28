<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentMethod
 *
 * @package App\Models
 * @version August 27, 2021, 8:20 am UTC
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Query\Builder|PaymentMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Query\Builder|PaymentMethod withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PaymentMethod withoutTrashed()
 * @mixin \Eloquent
 */
class PaymentMethod extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'ket',
    ];
}
