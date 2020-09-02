<?php

namespace App\Repositories;

use App\Models\ClasificacionMilitar;
use App\Repositories\BaseRepository;

/**
 * Class ClasificacionMilitarRepository
 * @package App\Repositories
 * @version September 12, 2019, 11:04 am -05
*/

class ClasificacionMilitarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'institucion',
        'tipo_personal',
        'institucion_id'
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
        return ClasificacionMilitar::class;
    }


    /**
     * addFilterByInstitucion
     *
     * agrega un filtro por el id de la institucion
     *
     * @param mixed $institucion_id
     * @return void
     */
    public function addFilterByInstitucion($institucion_id){
        $this->addScope('institucion_id',function($query)use ($institucion_id){
            return $query->where('institucion_id',$institucion_id);
        });
    }
}
