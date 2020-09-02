<?php

namespace App\Repositories\moduloAdministrativo;

use App\Models\moduloAdministrativo\Cargo;
use App\Repositories\BaseRepository;

/**
 * Class CargoRepository
 * @package App\Repositories
 * @version August 20, 2019, 2:02 pm -05
*/

class CargoRepository extends BaseRepository
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
        return Cargo::class;
    }
}
