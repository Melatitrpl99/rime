<?php

namespace App\Repositories;

use App\Models\Shipment;
use App\Repositories\BaseRepository;

/**
 * Class ShipmentRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:21 am UTC
*/

class ShipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_lengkap',
        'alamat',
        'alamat_manual',
        'kode_pos',
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
        return Shipment::class;
    }
}
