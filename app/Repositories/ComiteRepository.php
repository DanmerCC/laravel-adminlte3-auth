<?php

namespace App\Repositories;

use App\Models\Comite;
use App\Repositories\BaseRepository;

/**
 * Class ComiteRepository
 * @package App\Repositories
 * @version September 21, 2019, 9:43 pm -05
*/

class ComiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'complet_name',
        'start_date',
        'end_date',
        'image',
        'state'
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
     * Return sortable fields
     *
     * @return array
     */
    public function getFieldsSortable(){
        return [];
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comite::class;
    }
}
