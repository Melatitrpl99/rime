<?php

namespace App\Repositories;

use App\Models\Shipment;
use App\Repositories\BaseRepository;

/**
 * Class ShipmentRepository
 * @package App\Repositories
 * @version March 2, 2021, 5:53 am UTC
*/

class ShipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'nama_lengkap',
        'alamat',
        'alamat_manual',
        'kode_pos',
        'rt',
        'rw'
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
