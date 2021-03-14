<?php

namespace App\Repositories;

use App\Models\Discount;
use App\Repositories\BaseRepository;

/**
 * Class DiscountRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:09 am UTC
*/

class DiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'kode',
        'batas_pemakaian',
        'diskon_kategori',
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
        return Discount::class;
    }
}
