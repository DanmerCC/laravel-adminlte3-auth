<?php

namespace App\Repositories\moduloAcademico;

use App\Models\moduloAcademico\Programa;
use App\Models\moduloAcademico\TipoPrograma;
use App\Repositories\BaseRepository;

/**
 * Class ProgramaRepository
 * @package App\Repositories
 * @version June 27, 2019, 4:46 pm UTC
*/

class ProgramaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'abreviatura',
        'tipo_id'
    ];

    /**
     * @var array
     */
    protected $fieldSortable = [
        'id'
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
        return [
            'id'
        ];
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Programa::class;
    }


    public function getByIdTipoPrograma($id){

        return Programa::where('tipo_id',$id)->get();

    }


    /**
     * withPersons
     *
     * @return void
     */
    public function withPersons(){
        $this->setScope(function($query){
            $query->with('tipo');
        });
    }

    /**
     * withTipo
     *
     * @return void
     */
    public function withTipo(){
        $this->addScope('tipo_id',function($query){
            $query->with('tipo');
        });
    }


    public function orderById($desc=true){
        $this->addRuleOrderBy('id',$desc);
    }

}
