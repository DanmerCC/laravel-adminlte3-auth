<?php

namespace App\Models\moduloAcademico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoActaAdmision
 * @package App\Models
 * @version September 19, 2019, 10:21 pm -05
 *
 * @property string nombre
 */
class EstadoActaAdmision extends Model
{
    use SoftDeletes;

    public $table = 'estado_acta_admisions';

    const PENDIENTE = 1;
    const REVISADO = 2;
    const RECHAZADO = 3;
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

    ];


}
