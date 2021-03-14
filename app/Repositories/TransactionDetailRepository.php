<?php

namespace App\Repositories;

use App\Models\TransactionDetail;
use App\Repositories\BaseRepository;

/**
 * Class TransactionDetailRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:21 am UTC
*/

class TransactionDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subtotal'
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
