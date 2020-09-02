<?php

namespace App\Repositories;

use App\Models\TipoDataEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class TipoDataEmpleadoRepository
 * @package App\Repositories
 * @version September 13, 2019, 2:17 pm -05
*/

class TipoDataEmpleadoRepository extends BaseRepository
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
        return TipoDataEmpleado::class;
    }
}
