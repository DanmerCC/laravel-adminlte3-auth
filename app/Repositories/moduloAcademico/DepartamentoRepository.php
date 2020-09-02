<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Departamento;
use App\Repositories\BaseRepository;

/**
 * Class DepartamentoRepository
 * @package App\Repositories
 * @version August 2, 2019, 5:32 pm -05
*/

class DepartamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'pais_id'
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
        return Departamento::class;
    }

    public function searchByPaisAndNombre($filters,$perPage,$columns=['*']){

        $query = $this->allQuery($filters);

        return $query->paginate($perPage, $columns);
    }



}
