<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\EstadoActaAdmision;
use App\Repositories\BaseRepository;

/**
 * Class EstadoActaAdmisionRepository
 * @package App\Repositories
 * @version September 19, 2019, 10:21 pm -05
*/

class EstadoActaAdmisionRepository extends BaseRepository
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
        return EstadoActaAdmision::class;
    }
}
