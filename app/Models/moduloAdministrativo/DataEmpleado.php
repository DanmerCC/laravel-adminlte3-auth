<?php

namespace App\Models\moduloAdministrativo;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataEmpleado
 * @package App\Models
 * @version August 20, 2019, 2:07 pm -05
 *
 * @property \App\Models\Persona persona
 * @property integer persona_id
 */
class DataEmpleado extends Model
{
    use SoftDeletes;

    public $table = 'data_empleados';


    protected $dates = ['deleted_at'];


    protected $with = ['tipo','estado'];


    public $fillable = [
        'persona_id',
        'user_id',
        'estado_id',
        'tipo_id',
        'fecha_ingreso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'persona_id' => 'integer',
        'tipo_id' => 'integer',
        'estado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'persona_id'=>'required|unique:data_empleados',
        'estado_id'=>'required',
        'tipo_id'=>'required',
        'fecha_ingreso'=>'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'persona_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\TipoDataEmpleado::class, 'tipo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\EstadoDataEmpleado::class, 'estado_id', 'id');
    }
}
