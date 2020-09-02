<?php

namespace App\Repositories;

use App\Models\ComiteEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class ComiteEmpleadoRepository
 * @package App\Repositories
 * @version September 21, 2019, 9:45 pm -05
*/

class ComiteEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'comite_id'
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
        return ComiteEmpleado::class;
    }


    public function addFilterComite($id){
        $this->where('comite_id',$id);
    }
}
