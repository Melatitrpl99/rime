<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Repositories\BaseRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:05 am UTC
*/

class ActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc',
        'loggable'
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
