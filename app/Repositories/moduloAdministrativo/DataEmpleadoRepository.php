<?php

namespace App\Repositories\moduloAdministrativo;

use App\Models\EstadoDataEmpleado;
use Illuminate\Container\Container as Application;
use App\Models\moduloAdministrativo\DataEmpleado;
use App\Models\Persona;
use App\Models\TipoDataEmpleado;
use App\Repositories\BaseRepository;
use App\Repositories\PersonaRepository;
use Illuminate\Support\Collection;

/**
 * Class DataEmpleadoRepository
 * @package App\Repositories
 * @version August 20, 2019, 2:07 pm -05
*/

class DataEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'persona_id',
        'persona',
        'estado_id',
        'tipo_id',
        'user_id'
    ];

    /**
     * $personaRepository
     *
     * @var PersonaRepository
     */
    public $personaRepository;
    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app,PersonaRepository $personaRepo)
    {
        parent::__construct($app);
        $this->personaRepository=$personaRepo;
    }
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
        return DataEmpleado::class;
    }

    /**
     * withPersons
     *
     * @return void
     */
    public function withPersons(){
        $this->addScope('persona',function($query){
            $query->with('persona');
        });
    }

    /**
     * withPersons
     *
     * @return void
     */
    public function withUser(){
        $this->addScope('user_id',function($query){
            $query->with('users');
        });
    }


    /**
     * Agrega un filtro de por una array de id's de usuario
     *
     * @param mixed $array
     * @return void
     */
    public function addFilterPersonaIds($array){
        $this->whereIn('persona_id',$array);
    }

    /**
     * addFilterByUserId
     *
     * @param integer $estado
     * @return void
     */
    public function addFilterByUserId($user_id){
        $this->addScope('user_id',function($query)use ($user_id){
            return $query->where('user_id',$user_id);
        });
    }

    /**
     * addFilterByMonthNacimiento
     *
     * @param integer $estado
     * @return void
     */
    public function addFilterByEstado($estado){

        $this->addScope('estado_id',function($query)use ($estado){
            return $query->where('estado_id',$estado);
        });

    }

    /**
     * addFilterByMonthNacimiento
     *
     * @param integer $tipo
     * @return void
     */
    public function addFilterByTipo($tipo){

        $this->addScope('tipo_id',function($query)use ($tipo){
            return $query->where('tipo_id',$tipo);
        });

    }

    public function estadisticas(){
        $empleados=DataEmpleado::query()->get();
        $empleados_activos=new Collection();
        $empleados_noactivos=new Collection();

        $empleados->each(function($empleado)use($empleados_activos,$empleados_noactivos){
            if($empleado->estado_id==EstadoDataEmpleado::ACTIVO){
                $empleados_activos->push($empleado);
            }
            if($empleado->estado_id==EstadoDataEmpleado::CESADO){
                $empleados_noactivos->push($empleado);
            }
        });

        $empleados_activos_ids=$empleados_activos->pluck('persona_id');
        $empleados_noactivos_id=$empleados_noactivos->pluck('persona_id');

        $personas_de_empleados_activos=Persona::whereIn('id',$empleados_activos_ids)->get();

        $cantidad_empleados_activos_militares=0;

        //dd($personas_de_empleados_activos->count());
        $personas_de_empleados_activos->each(function($emp)use(&$cantidad_empleados_activos_militares){
            if($emp->dato_militar_id!=null){
                $cantidad_empleados_activos_militares++;
            }
        });

        $empleados_activos_civiles=$personas_de_empleados_activos->count()-$cantidad_empleados_activos_militares;
        $result=array(
            'empleados_activos_militares'=>$cantidad_empleados_activos_militares,
            'empleados_activos_civiles'=>$empleados_activos_civiles
        );
        return $result;

    }

}
