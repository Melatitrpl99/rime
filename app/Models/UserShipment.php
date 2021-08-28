<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserShipment.
 *
 * @property int $id
 * @property string $alamat
 * @property string $kode_pos
 * @property string|null $catatan
 * @property bool $is_default
 * @property string $village_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Village $village
 * @method static \Database\Factories\UserShipmentFactory factory(...$parameters)
 * @method static Builder|UserShipment isDefault()
 * @method static Builder|UserShipment newModelQuery()
 * @method static Builder|UserShipment newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserShipment onlyTrashed()
 * @method static Builder|UserShipment query()
 * @method static Builder|UserShipment whereAlamat($value)
 * @method static Builder|UserShipment whereCatatan($value)
 * @method static Builder|UserShipment whereCreatedAt($value)
 * @method static Builder|UserShipment whereDeletedAt($value)
 * @method static Builder|UserShipment whereId($value)
 * @method static Builder|UserShipment whereIsDefault($value)
 * @method static Builder|UserShipment whereKodePos($value)
 * @method static Builder|UserShipment whereUpdatedAt($value)
 * @method static Builder|UserShipment whereUserId($value)
 * @method static Builder|UserShipment whereVillageId($value)
 * @method static \Illuminate\Database\Query\Builder|UserShipment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserShipment withoutTrashed()
 * @mixin \Eloquent
 */
class UserShipment extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'alamat',
        'kode_pos',
        'catatan',
        'is_default',
        'village_id',
        'user_id',
    ];

    protected $casts = [
        'kode_pos'   => 'string',
        'is_default' => 'boolean',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function scopeIsDefault(Builder $query): Builder
    {
        return $query->where('is_default', true);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
