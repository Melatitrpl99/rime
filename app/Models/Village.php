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
use App\Models\District;
use Znck\Eloquent\Traits\BelongsToThrough;

/**
 * Village Model.
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
    use VillageTrait, BelongsToThrough;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'villages';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'district_id'
    ];

    /**
     * Village belongs to District.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function regency()
    {
        return $this->belongsToThrough(Regency::class, District::class);
    }

    /**
     * @return \Znck\Eloquent\Relations\BelongsToThrough
     */
    public function province()
    {
        return $this->belongsToThrough(Province::class, [Regency::class, District::class]);
    }
}
