<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\TipoPrograma;
use App\Repositories\BaseRepository;

/**
 * Class TipoProgramaRepository
 * @package App\Repositories
 * @version June 27, 2019, 4:39 pm UTC
*/

class TipoProgramaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'titulo'
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
        return TipoPrograma::class;
    }
}
