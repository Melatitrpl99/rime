<?php

namespace App\Repositories;

use App\Models\TransactionDetail;
use App\Repositories\BaseRepository;

/**
 * Class TransactionDetailRepository
 * @package App\Repositories
 * @version March 2, 2021, 5:15 am UTC
*/

class TransactionDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
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
        return TransactionDetail::class;
    }
}
