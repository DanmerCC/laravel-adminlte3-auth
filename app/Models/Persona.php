<?php

namespace App\Models;

use App\Models\moduloAcademico\Pais;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Persona
 * @package App\Models
 * @version August 5, 2019, 10:54 am -05
 *
 * @property \App\Models\TipoDocumento tipoDocumentos
 * @property \App\Models\Departamento departamentoNacimiento
 * @property \App\Models\Pais paisNacionalidad
 * @property integer id_perfilweb
 * @property string genero
 * @property string apellido_paterno
 * @property string apellido_materno
 * @property string nombres
 * @property string fecha_nacimiento
 * @property string documento
 * @property integer tipo_documentos_id
 * @property integer departamento_nacimiento_id
 * @property integer pais_nacionalidad_id
 */
class Persona extends Model
{
    use SoftDeletes;

    public $table = 'personas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'genero',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'fecha_nacimiento',
        'documento',
        'tipo_documentos_id',
        'persona_ref_id',
        'pais_nacionalidad_id',
        'direccion_nacimiento_id',
        'direccion_id',
        'dato_militar_id',
        'telefono',
        'grado_profesion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'genero' => 'string',
        'apellido_paterno' => 'string',
        'apellido_materno' => 'string',
        'nombres' => 'string',
        'fecha_nacimiento' => 'date',
        'documento' => 'string',
        'tipo_documentos_id' => 'integer',
        'pais_nacionalidad_id' => 'integer',
        'direccion_nacimiento_id' => 'integer',
        'direccion_id'=>'integer',
        'grado_profesion'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'documento' => 'required|unique:personas',
        'fecha_nacimiento' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoDocumentos()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\TipoDocumento::class, 'tipo_documentos_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paisNacionalidad()
    {
        return $this->belongsTo(Pais::class, 'pais_nacionalidad_id', 'id');
    }

    /**
     * Domicilio
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function direccion()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Direccion::class, 'direccion_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function direccionNacimiento()
    {
        return $this->belongsTo(\App\Models\moduloAcademico\Direccion::class, 'direccion_nacimiento_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function datosMilitar()
    {
        return $this->belongsTo(\App\DatosMilitar::class, 'dato_militar_id', 'id');
    }
}
