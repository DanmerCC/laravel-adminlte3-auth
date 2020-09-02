<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Distrito;
use App\Repositories\BaseRepository;

/**
 * Class DistritoRepository
 * @package App\Repositories
 * @version August 2, 2019, 5:40 pm -05
*/

class DistritoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Return sortable fields
     *
     * @return array
     */
    public function getFieldsSortable(){
        return [];
    }

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
        return Distrito::class;
    }

    public function searchCustom($filters,$perPage,$columns=['*']){

        $query = $this->allQuery($filters);

        return $query->paginate($perPage, $columns);
    }
}
