<?php

namespace App\Repositories;

use App\Models\RevisionActaEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class RevisionActaEmpleadoRepository
 * @package App\Repositories
 * @version September 21, 2019, 9:47 pm -05
*/

class RevisionActaEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_revision_id',
        'acta_id'
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
     * Configure the Model
     **/
    public function model()
    {
        return RevisionActaEmpleado::class;
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
     * addFilterByEstadoRevisionId
     *
     * agrega un filtro por el id de las actas
     *
     * @param mixed $acta_id
     * @return void
     */
    public function addFilterByEstadoRevisionId($acta_id){
        $this->addScope('acta_id',function($query)use ($acta_id){
            return $query->where('acta_id',$acta_id);
        });
    }
}
