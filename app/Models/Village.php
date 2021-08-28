<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\VillageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

/**
 * App\Models\Village.
 *
 * @property int $id
 * @property string $district_id
 * @property string $name
 * @property-read District $district
 * @method static \Illuminate\Database\Eloquent\Builder|Village newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Village newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Village query()
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereName($value)
 * @mixin \Eloquent
 */
class Village extends Model
{
    use VillageTrait, BelongsToThroughTrait;

    protected $hidden = [
        'district_id',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function regency(): BelongsToThrough
    {
        return $this->belongsToThrough(Regency::class, District::class);
    }

    public function province(): BelongsToThrough
    {
        return $this->belongsToThrough(Province::class, [Regency::class, District::class]);
    }
}
