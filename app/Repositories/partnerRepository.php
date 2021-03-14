<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\BaseRepository;

/**
 * Class PartnerRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:08 am UTC
*/

class PartnerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'deskripsi',
        'alamat',
        'lokasi',
        'email',
        'no_hp',
        'slug'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Partner::class;
    }
}
