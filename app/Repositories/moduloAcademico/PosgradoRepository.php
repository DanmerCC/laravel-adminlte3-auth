<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Posgrado;
use App\Repositories\BaseRepository;

/**
 * Class PosgradoRepository
 * @package App\Repositories
 * @version June 28, 2019, 4:24 pm UTC
*/

class PosgradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_limite',
        'abreviatura',
        'monto_total',
        'fecha_inicio',
        'fecha_final',
        'tipo_id'
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
        return Posgrado::class;
    }
}
