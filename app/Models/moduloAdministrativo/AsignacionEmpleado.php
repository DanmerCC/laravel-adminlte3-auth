<?php

namespace App\Models\moduloAdministrativo;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsignacionEmpleado
 * @package App\Models
 * @version August 20, 2019, 2:08 pm -05
 *
 * @property \App\Models\DataEmpleado dataEmpleado
 * @property \App\Models\NodoOrganizacional nodoOrganizacionals
 * @property integer data_empleado_id
 * @property integer nodo_organizacionals_id
 */
class AsignacionEmpleado extends Model
{
    use SoftDeletes;

    public $table = 'asignacion_empleados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'data_empleado_id',
        'nodo_organizacionals_id',
        'cargo_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'data_empleado_id' => 'integer',
        'nodo_organizacionals_id' => 'integer',
        'cargo_id'=>'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'data_empleado_id' => 'required',
        'nodo_organizacionals_id' => 'required',
        'cargo_id'=>'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataEmpleado()
    {
        return $this->belongsTo(DataEmpleado::class, 'data_empleado_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nodoOrganizacionals()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\NodoOrganizacional::class, 'nodo_organizacionals_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'nodo_organizacionals_id', 'id');
    }
}
