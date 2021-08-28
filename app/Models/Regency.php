<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\RegencyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Regency.
 *
 * @property int $id
 * @property string $province_id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\District[] $districts
 * @property-read int|null $districts_count
 * @property-read \App\Models\Province $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Village[] $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder|Regency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Regency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regency whereProvinceId($value)
 * @mixin \Eloquent
 */
class Regency extends Model
{
    use RegencyTrait;

    protected $table = 'regencies';

    protected $hidden = [
        'province_id',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function villages(): HasManyThrough
    {
        return $this->hasManyThrough(Village::class, District::class);
    }
}
