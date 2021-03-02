<?php

namespace App\Repositories;

use App\Models\Carts;
use App\Repositories\BaseRepository;

/**
 * Class CartsRepository
 * @package App\Repositories
 * @version February 24, 2021, 8:55 am UTC
*/

class CartsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'slug',
        'user_id'
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
        return Carts::class;
    }
}
