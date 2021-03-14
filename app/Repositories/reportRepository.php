<?php

namespace App\Repositories;

use App\Models\Report;
use App\Repositories\BaseRepository;

/**
 * Class ReportRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:20 am UTC
*/

class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'is_import',
        'detail_laporan',
        'slug'
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
        return Report::class;
    }
}
