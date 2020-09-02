<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\TipoDocumento;
use App\Repositories\BaseRepository;

/**
 * Class TipoDocumentoRepository
 * @package App\Repositories
 * @version August 1, 2019, 5:07 pm -05
*/

class TipoDocumentoRepository extends BaseRepository
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
        return TipoDocumento::class;
    }
}
