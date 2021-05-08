<?php

namespace App\Repositories;

use App\Models\Spending;
use App\Repositories\BaseRepository;

/**
 * Class SpendingRepository
 * @package App\Repositories
 * @version April 28, 2021, 3:49 am UTC
*/

class SpendingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'nomor',
        'kategori',
        'deskripsi',
        'jumlah_barang',
        'total',
        'biaya_tambahan',
        'sub_total'
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
        return Spending::class;
    }
}
