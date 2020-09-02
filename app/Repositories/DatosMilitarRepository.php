<?php

namespace App\Repositories;

use App\DatosMilitar;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class PersonaRepository
 * @package App\Repositories
 * @version August 5, 2019, 10:54 am -05
*/

class DatosMilitarRepository extends BaseRepository
{
    private $external_api;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clasificacion_id',
        'estado_actividad',
        'fecha_ingreso'
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
        return DatosMilitar::class;
    }
    /**
     * findCustom
     *
     * @param mixed $campo
     * @param mixed $value
     * @param mixed $columns
     * @return void
     */
    public static function findCustom($campo,$value,$columns = array('*')){
        return DatosMilitar::where($campo,'=',$value)->first($columns);
    }

    /**
     * searchCustom
     *
     * @param mixed $filters
     * @param mixed $perPage
     * @param mixed $columns=['*']
     * @return void
     */
    public function searchCustom($filters,$perPage,$columns=['*']){

        $query = $this->allQuery($filters);

        return $query->paginate($perPage, $columns);
    }

}
