<?php

namespace App\Repositories;

use App\Models\partner;
use App\Repositories\BaseRepository;

/**
 * Class partnerRepository
 * @package App\Repositories
 * @version March 2, 2021, 5:27 am UTC
*/

class partnerRepository extends BaseRepository
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
        'no_hp'
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
        return partner::class;
    }
}
