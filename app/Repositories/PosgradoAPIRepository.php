<?php

namespace App\Repositories;

use App\Models\moduloAcademico\Posgrado;

/**
 * Class PosgradoAPIRepository
 * @package App\Repositories
 * @version February 24, 2020, 3:21 am UTC
*/

class PosgradoAPIRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'abreviarura',
        'id',
        'name',
        'programa_id'
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
        return Posgrado::class;
    }

    public function with($array = []){

        for ($i=0; $i < count($array); $i++) {
            $this->addWith($array[$i]);
        }
    }
}
