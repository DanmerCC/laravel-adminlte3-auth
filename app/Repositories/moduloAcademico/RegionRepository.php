<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Region;
use App\Repositories\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version August 2, 2019, 5:38 pm -05
*/

class RegionRepository extends BaseRepository
{

    /**
     * @var array
     */
    protected $fieldSortable = [
        'id'
    ];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'departamento_id'
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
    public function getFieldsSortable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Region::class;
    }

    public function searchCustom($filters,$perPage,$columns=['*']){

        $query = $this->allQuery($filters);

        return $query->paginate($perPage, $columns);
    }
}
