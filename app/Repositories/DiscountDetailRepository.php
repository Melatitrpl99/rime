<?php

namespace App\Repositories;

use App\Models\DiscountDetail;
use App\Repositories\BaseRepository;

/**
 * Class DiscountDetailRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:09 am UTC
*/

class DiscountDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'diskon_harga',
        'minimal_produk',
        'maksimal_produk'
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
        return DiscountDetail::class;
    }
}
