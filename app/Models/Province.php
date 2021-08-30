<?php

/**
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

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
