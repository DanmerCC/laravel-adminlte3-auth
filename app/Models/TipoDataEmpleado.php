<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoDataEmpleado
 * @package App\Models
 * @version September 13, 2019, 2:17 pm -05
 *
 * @property string nombre
 */
class TipoDataEmpleado extends Model
{
    const CAS=1;
    const MILITAR=2;
    const LOCADOR=3;

    use SoftDeletes;

    public $table = 'tipo_data_empleados';


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
