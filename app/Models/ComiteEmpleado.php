<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComiteEmpleado
 * @package App\Models
 * @version September 21, 2019, 9:45 pm -05
 *
 * @property \App\Models\Comite comite
 * @property \App\Models\DataEmpleados empleado
 * @property integer comite_id
 * @property integer empleado_id
 */
class ComiteEmpleado extends Model
{
    use SoftDeletes;

    public $table = 'comite_empleados';

    const COMITE_ADMISION = 1;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'comite_id',
        'empleado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'comite_id' => 'integer',
        'empleado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function comite()
    {
        return $this->belongsTo(\App\Models\Comite::class, 'comite_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empleado()
    {
        return $this->belongsTo(\App\Models\moduloAdministrativo\DataEmpleado::class, 'empleado_id', 'id');
    }
}
