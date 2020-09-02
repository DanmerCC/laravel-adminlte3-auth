<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Admision;
use App\Repositories\BaseRepository;

/**
 * Class AdmisionRepository
 * @package App\Repositories
 * @version August 11, 2019, 11:44 pm -05
*/

class AdmisionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descargado',
        'persona_id',
        'inscripcion_id',
        'acta_id',
        'posgrado_id'
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
        return Admision::class;
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
        return Admision::where($campo,'=',$value)->first($columns);
    }

    public function addFilterByInscripcionId($value){
        $this->where('inscripcion_id',$value);
    }

    public function addFilterByDescargado($value){
        $this->where('descargado',$value);
    }

    public function addFilterByPosgradoId($value){
        $this->where('posgrado_id',$value);
    }

    public function addFiltersByIds($values){
        $this->whereIn('inscripcion_id',$values);
    }

    /**
     * withPersons
     *
     * @return void
     */
    public function withPersons(){
        $this->addScope('persona_id',function($query){
            $query->with('persona');
        });
    }

    /**
     * withActas
     *
     * @return void
     */
    public function withActas(){
        $this->addScope('acta_id',function($query){
            $query->with('actaAdmision');
        });
    }
}
