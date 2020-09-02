<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\NodoOrganizacional;
use App\Repositories\BaseRepository;

/**
 * Class NodoOrganizacionalRepository
 * @package App\Repositories
 * @version July 22, 2019, 9:25 am -05
*/

class NodoOrganizacionalRepository extends BaseRepository
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
        return NodoOrganizacional::class;
    }
}
