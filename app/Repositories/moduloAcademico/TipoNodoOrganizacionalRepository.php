<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\TipoNodoOrganizacional;
use App\Repositories\BaseRepository;

/**
 * Class TipoNodoOrganizacionalRepository
 * @package App\Repositories
 * @version July 22, 2019, 9:18 am -05
*/

class TipoNodoOrganizacionalRepository extends BaseRepository
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
        return TipoNodoOrganizacional::class;
    }
}
