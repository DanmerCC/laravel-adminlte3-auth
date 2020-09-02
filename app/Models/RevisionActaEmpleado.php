<?php

namespace App\Models;

use App\Models\moduloAdministrativo\DataEmpleado;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RevisionActaEmpleado
 * @package App\Models
 * @version September 21, 2019, 9:47 pm -05
 *
 * @property \App\Models\DataEmpleado empleado
 * @property \App\Models\DataEmpleado empleado
 * @property \App\Models\EstatusRevision statusRevision
 * @property integer empleados_id
 * @property integer acta_id
 * @property integer status_revision_id
 * @property integer numero
 */
class RevisionActaEmpleado extends Model
{
    use SoftDeletes;

    public $table = 'revision_acta_empleados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'empleados_id',
        'acta_id',
        'status_revision_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empleados_id' => 'integer',
        'acta_id' => 'integer',
        'status_revision_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empleados_id' => 'required',
        'acta_id' => 'required',
        'status_revision_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empleado()
    {
        return $this->belongsTo(DataEmpleado::class, 'empleado_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\EstatusRevision::class, 'status_revision_id', 'id');
    }
}
