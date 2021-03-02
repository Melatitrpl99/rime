<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use App\Repositories\BaseRepository;

/**
 * Class OrderDetailRepository
 * @package App\Repositories
 * @version February 27, 2021, 7:01 am UTC
*/

class OrderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cart_id',
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
        return OrderDetail::class;
    }
}
