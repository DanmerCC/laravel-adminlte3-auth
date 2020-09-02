<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Pais;
use App\Repositories\BaseRepository;

/**
 * Class PaisRepository
 * @package App\Repositories
 * @version August 2, 2019, 5:21 pm -05
*/

class PaisRepository extends BaseRepository
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
        return Pais::class;
    }
}
