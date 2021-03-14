<?php

namespace App\Repositories;

use App\Models\CartDetail;
use App\Repositories\BaseRepository;

/**
 * Class CartDetailRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:10 am UTC
*/

class CartDetailRepository extends BaseRepository
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
        return CartDetail::class;
    }
}
