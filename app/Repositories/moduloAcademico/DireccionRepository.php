<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Direccion;
use App\Repositories\BaseRepository;

/**
 * Class DireccionRepository
 * @package App\Repositories
 * @version August 2, 2019, 5:45 pm -05
*/

class DireccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
        return Direccion::class;
    }
}
