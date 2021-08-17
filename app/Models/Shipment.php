<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Shipment
 *
 * @package App\Models
 * @version August 7, 2021, 9:51 am UTC
 * @property \App\Models\Village $village
 * @property \App\Models\User $user
 * @property string $alamat
 * @property string $no
 * @property string $rt
 * @property string $rw
 * @property foreignId $village_id
 * @property string $kode_pos
 * @property string $catatan
 * @property foreignId $user_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\ShipmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Shipment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereKodePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereVillageId($value)
 * @method static \Illuminate\Database\Query\Builder|Shipment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Shipment withoutTrashed()
 * @mixin \Eloquent
 */
class Shipment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'shipments';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'alamat',
        'village_id',
        'kode_pos',
        'catatan',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'alamat' => 'string',
        'kode_pos' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'alamat'      => 'required',
        'village_id'  => 'required',
        'kode_pos'    => 'required',
        'catatan'     => 'nullable',
        'user_id'     => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
