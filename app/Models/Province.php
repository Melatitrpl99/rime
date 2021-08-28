<?php

/**
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * App\Models\Province
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\District[] $districts
 * @property-read int|null $districts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Regency[] $regencies
 * @property-read int|null $regencies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @mixin \Eloquent
 */
class Province extends Model
{
    use ProvinceTrait, HasRelationships;

    protected $table = 'provinces';

    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class);
    }

    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, Regency::class);
    }

    public function villages(): HasManyDeep
    {
        return $this->hasManyDeep(Village::class, [Regency::class, District::class]);
    }
}
