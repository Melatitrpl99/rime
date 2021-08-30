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
