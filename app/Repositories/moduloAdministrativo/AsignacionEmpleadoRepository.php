<?php

namespace App\Repositories\moduloAdministrativo;

use App\Models\moduloAdministrativo\AsignacionEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class AsignacionEmpleadoRepository
 * @package App\Repositories
 * @version August 20, 2019, 2:08 pm -05
*/

class AsignacionEmpleadoRepository extends BaseRepository
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
        return AsignacionEmpleado::class;
    }
}
