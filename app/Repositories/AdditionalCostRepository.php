<?php

namespace App\Repositories;

use App\Models\AdditionalCost;
use App\Repositories\BaseRepository;

/**
 * Class AdditionalCostRepository
 * @package App\Repositories
 * @version April 30, 2021, 6:09 am UTC
*/

class AdditionalCostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'nomor',
        'nama',
        'deskripsi',
        'total'
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
        return AdditionalCost::class;
    }
}
