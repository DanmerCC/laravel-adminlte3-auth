<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\EstadoCivil;
use App\Repositories\BaseRepository;

/**
 * Class EstadoCivilRepository
 * @package App\Repositories
 * @version August 2, 2019, 4:25 pm -05
*/

class EstadoCivilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return EstadoCivil::class;
    }
}
