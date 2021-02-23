<?php

namespace App\Repositories;

use App\Models\Events;
use App\Repositories\BaseRepository;

/**
 * Class EventsRepository
 * @package App\Repositories
 * @version February 22, 2021, 7:18 am UTC
*/

class EventsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'deskripsi',
        'waktu_mulai',
        'waktu_berakhir',
        'alamat',
        'nomor_hp',
        'email'
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
        return Events::class;
    }
}
