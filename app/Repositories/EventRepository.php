<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;

/**
 * Class EventRepository
 * @package App\Repositories
 * @version March 14, 2021, 12:07 am UTC
*/

class EventRepository extends BaseRepository
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
        'email',
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
        return Event::class;
    }
}
