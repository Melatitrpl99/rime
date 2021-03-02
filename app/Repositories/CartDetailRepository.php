<?php

namespace App\Repositories;

use App\Models\CartDetail;
use App\Repositories\BaseRepository;

/**
 * Class CartDetailRepository
 * @package App\Repositories
 * @version February 24, 2021, 9:06 am UTC
*/

class CartDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cart_id',
        'product_id',
        'jumlah'
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
