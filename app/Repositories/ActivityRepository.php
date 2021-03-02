<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Repositories\BaseRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories
 * @version February 24, 2021, 7:45 am UTC
*/

class ActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'deskripsi',
        'log',
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
        return Activity::class;
    }
}
