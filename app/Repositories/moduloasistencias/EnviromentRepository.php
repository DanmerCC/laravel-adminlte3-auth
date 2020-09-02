<?php

namespace App\Repositories\moduloasistencias;

use App\Models\moduloasistencias\Enviroment;
use App\Repositories\BaseAPIRepository;

class EnviromentRepository extends BaseAPIRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'color'
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
        return Enviroment::class;
    }
}
