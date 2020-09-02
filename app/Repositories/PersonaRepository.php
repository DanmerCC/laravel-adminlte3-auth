<?php

namespace App\Repositories;

use App\Models\EstadoDataEmpleado;
use App\Models\Persona;
use App\Models\TipoDataEmpleado;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

/**
 * Class PersonaRepository
 * @package App\Repositories
 * @version August 5, 2019, 10:54 am -05
*/

class PersonaRepository extends BaseRepository
{
    private $external_api;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'genero',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'fecha_nacimiento',
        'documento',
        'telefono',
        'persona_ref_id',
        'tipo_documentos_id',
        'estado_id',
        'tipo_id'
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
        return Persona::class;
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
        return Persona::where($campo,'=',$value)->first($columns);
    }

    /**
     * sincronizar
     *
     * @return void
     */
    public function sincronizar(){
       $this->external_api = new \App\Core\ExternalApi();
        $sp_id = $this->ultimo_sincronizado();
        try {
            $persona_alumnos = $this->external_api->getPersonas($sp_id);
            foreach ($persona_alumnos as $key => $alumno_api) {
                $alumno = $this->byDocumento($alumno_api->documento);
                if($alumno==null){
                    $persona_nuevo = array();
                    $persona_nuevo['nombres'] = $alumno_api->nombres;
                    $persona_nuevo['apellido_paterno'] = $alumno_api->apellido_paterno;
                    $persona_nuevo['apellido_materno'] = $alumno_api->apellido_materno;
                    $persona_nuevo['fecha_nacimiento'] = ($alumno_api->fecha_nac!='' && $alumno_api->fecha_nac!='0000-00-00')?Carbon::createFromFormat('Y-m-d', $alumno_api->fecha_nac):null;
                    $persona_nuevo['documento'] = $alumno_api->documento;
                    $persona_nuevo['persona_ref_id'] = $alumno_api->id_alumno;
                    $persona_nuevo['grado_profesion'] = $alumno_api->grado_profesion;
                    $this->create($persona_nuevo);
                }else{
                    $this->update(['persona_ref_id'=>$alumno_api->id_alumno],$alumno->id);
                }
            }
        } catch (\Exception $e) {
            Log::critical("Error en el personaRepository funcion sincronizar(): ".$e->getMessage());
        }

    }

    /**
     * function byDocumento
     * @param documento
     * busqueda
     */
    public function byDocumento($documento){
        return Persona::where('documento',$documento)->with('direccion')->with('direccionNacimiento')->with('datosMilitar')->first();
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

    /**
     * withPersons
     * incluye la direccion o domicilio
     *
     * @return void
     */
    public function withDireccion(){
        $this->addScope('direccion',function($query){
            $query->with('direccion');
        });
    }

    /**
     * withPersons
     * incluye la direccion o domicilio
     *
     * @return void
     */
    public function withDireccionNacimiento(){
        $this->addScope('direccionNacimiento',function($query){
            $query->with('direccionNacimiento');
        });
    }

    /**
     * withPersons
     * incluye la direccion o domicilio
     *
     * @return void
     */
    public function withDataMilitar(){
        $this->addScope('datos_militar_id',function($query){
            $query->with('datosMilitar');
        });
    }


    /**
     * withPersons
     * incluye la direccion o domicilio
     *
     * @return void
     */
    public function withTipoDocumento(){
        $this->addScope('tipo_documentos_id',function($query){
            $query->with('tipoDocumentos');
        });
    }


    /**
     * addFilterByNombres
     * agrega un filtro de nombre que empiecen por el
     * parametro nombre
     *
     * @param mixed $nombres
     * @return void
     */
    public function addFilterByNombres($nombres){
        $this->addScope('nombres',function($query)use ($nombres){
            $query->where('nombres','like',$nombres.'%');
        });
    }

    /**
     * addFilterByPersonaRefId
     * filtro por persona_ref_id
     * @param mixed $persona_ref_id
     * @return void
     */
    public function getByOnePersonaRefId($persona_ref_id,array $columns = array('*')){
        return Persona::where('persona_ref_id','=',$persona_ref_id)->first($columns);
    }
    /**
     * addFilterByDocumento
     *
     * agrega filtro por documentos parecidos
     *
     * @param mixed $documento
     * @return void
     */
    public function addFilterLikeDocumento($documento){
        $this->addScope('documento',function($query)use ($documento){
            $query->where('documento','like',$documento.'%');
        });
    }

    /**
     * addFilterByMonthNacimiento
     *
     * @param number $month
     * @return void
     */
    public function addFilterByMonthNacimiento($month){
        if($month>0 && $month<=12){
            $this->addScope('fecha_nacimiento',function($query)use ($month){
                return $query->whereMonth('fecha_nacimiento',$month);
            });
        }

    }


    /**
     * ultimo_sincronizado
     *
     * @return any
     */
    private function ultimo_sincronizado(){
        $ultimo_id=Persona::max('persona_ref_id');
        return $ultimo_id??0;
    }

}
