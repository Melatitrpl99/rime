<?php

namespace App\Repositories;

use App\Models\DiscountDetail;
use App\Repositories\BaseRepository;

/**
 * Class DiscountDetailRepository
 * @package App\Repositories
 * @version March 2, 2021, 6:38 am UTC
*/

class DiscountDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'discount_id',
        'id_produk',
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
