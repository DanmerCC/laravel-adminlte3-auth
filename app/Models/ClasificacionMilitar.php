<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClasificacionMilitar
 * @package App\Models
 * @version September 12, 2019, 11:04 am -05
 *
 *
 * @property string nombre
 * @property string institucion
 * @property string tipo_personal
 */
class ClasificacionMilitar extends Model
{
    use SoftDeletes;

    public $table = 'clasificacion_militars';

    protected $appends=['nombre_completo'];

    protected $with=['institucion'];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'institucion_id',
        'tipo_personal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'institucion_id' => 'integer',
        'nombre' => 'string',
        'tipo_personal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'institucion_id'=>'required'
    ];

    /**
     * nombre_completo
     *
     * @return String
     */
    public function nombre_completo(){
        return $this->nombre.'-'.$this->institucion->nombre;
    }

    /**
     * asscesor
     *
     * @return String
     */
    public function getNombreCompletoAttribute(){
        return $this->nombre.'-'.$this->institucion->nombre;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function institucion()
    {
        return $this->belongsTo(\App\InstitucionMil::class, 'institucion_id', 'id');
    }
}
