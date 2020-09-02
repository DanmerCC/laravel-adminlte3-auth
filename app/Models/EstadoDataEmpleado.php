<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoDataEmpleado
 * @package App\Models
 * @version September 13, 2019, 2:17 pm -05
 *
 * @property string nombre
 */
class EstadoDataEmpleado extends Model
{
    use SoftDeletes;

    const ACTIVO=1;
    const CESADO=2;

    public $table = 'estado_data_empleados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre'=>'required'
    ];


}
