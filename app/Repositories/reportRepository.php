<?php

namespace App\Repositories;

use App\Models\report;
use App\Repositories\BaseRepository;

/**
 * Class reportRepository
 * @package App\Repositories
 * @version March 2, 2021, 5:37 am UTC
*/

class reportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'is_import',
        'slug',
        'detail_laporan',
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
        return report::class;
    }
}
