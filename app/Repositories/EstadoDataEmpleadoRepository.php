<?php

namespace App\Repositories;

use App\Models\EstadoDataEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class EstadoDataEmpleadoRepository
 * @package App\Repositories
 * @version September 13, 2019, 2:17 pm -05
*/

class EstadoDataEmpleadoRepository extends BaseRepository
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
        return EstadoDataEmpleado::class;
    }
}
